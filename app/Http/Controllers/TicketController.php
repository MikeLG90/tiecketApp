<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\TicketFile;
use App\Models\User;
use App\Models\Oficina;
use App\Models\Notificacion;
use Carbon\Carbon;
use App\Services\GmailService;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{

    protected $gmailService;

    public function __construct(GmailService $gmailService)
    {
        $this->gmailService = $gmailService;
    }


    public function create() {

        $oficinas = Oficina::all();

        return view('rppc.tickets.ticket_form', compact('oficinas'));
    }

    public function userOficina($oficinaId) 
    {
        $query = DB::table('usuarios as u')
        ->join('persona as p','p.usuario_id','=','u.usuario_id')
        ->join('oficinas as o', 'o.oficina_id', '=','u.oficina_id')
        ->join('areas as a', 'a.area_id', '=', 'u.area_id')
        ->select(
            'u.*',
            'a.area',
            DB::raw('CONCAT(p.nombre, " ", p.ape_paterno, " ", p.ape_materno, " (", a.area, ", ", o.oficina, ")") as nombre_completo')
        );
           // $query->where('u.oficina_id', $oficinaId);

        if(auth()->user()->rol_id == 6) {
            $query->where('u.oficina_id', $oficinaId);
            $query->whereIn('u.rol_id', [8, 7]);
        } elseif (auth()->user()->rol_id == 8) {
            $query->where('u.oficina_id', $oficinaId);
            $query->where('a.area', 'Jurídico');
        } elseif (auth()->user()->rol_id == 7) {
            $query->where('u.oficina_id', $oficinaId);
            $query->where('a.area','Sistemas');
        } else {
            $query->where('u.oficina_id', $oficinaId);
        }

       $usuarios = $query->get();

        return response()->json($usuarios);
    }

    public function store(Request $request) 
    {
        // Localizar el correo del usuario

        $user = User::find($request->usuario_id);

        $userEmail = $user->email;

     $request->validate([
            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Ajusta según tus necesidades
        ]);
   
        $ticket = new Ticket();

        $ultimoTicket = Ticket::latest()->first();
        $nu_ticket = null;

        if($ultimoTicket) {

        if($ultimoTicket->nu_ticket == 0) {
            $nu_ticket = 1;
        }else {
            $nu_ticket = $ultimoTicket->nu_ticket + 1; 
        }

    }else {
        $nu_ticket =1;
    }

        $ticket->destinatario_id = $request->usuario_id;
        $ticket->remitente_id = auth()->user()->usuario_id;
        $ticket->titulo = $request->titulo;
        $ticket->nu_ticket = $nu_ticket;
        $ticket->fecha_aper = $request->fecha_apertura;
        $ticket->fecha_lim = $request->fecha_limite;
        $ticket->tipo = $request->tipo;
        $ticket->categoria = null;
        $ticket->estado = $request->estado;
        $ticket->urgencia = $request->urgencia;
        $ticket->impacto = $request->impacto;
        $ticket->prioridad = $request->prioridad;
        $ticket->descripcion = $request->descripcion;
        $ticket->save();

            // Manejar la carga de archivos
    if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $file) {

            //$customName = 'ticket_' . $ticket->ticket_id . '_' . time() . '.' . $file->getClientOriginalExtension();
            // Obtener el nombre original del archivo
            $originalName = $file->getClientOriginalName();
            $uniqueName = "TCK-" . $ticket->nu_ticket . '-' . pathinfo($originalName, PATHINFO_FILENAME) . '-' . time() . '.' . $file->getClientOriginalExtension();
           //$customName = 'ticket_' . $ticket->ticket_id . '_' . time() . '.' . $file->getClientOriginalExtension();
           //$uniqueName = "TCK-" . $ticket->nu_ticket . '-' . time() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('archivos', $uniqueName, 'ftp'); // Usa el disco FTP
            
            // Crea un nuevo registro de adjunto
            TicketFile::create([
                'ticket_id' => $ticket->ticket_id,
                'file_path' => $path,
            ]);
        }
    }

    //DD($ticket);
    return redirect("/inbox")->with('success', 'Ticket creado correctamente');
}

    public function ticketFiles($id)
    {

        $ticket = DB::table('tickets as t')
        ->join('usuarios as u', 't.remitente_id', '=', 'u.usuario_id')
        ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
        ->select('t.*',                
        DB::raw('CONCAT(p.nombre, " ", p.ape_materno, " ", p.ape_paterno) AS remitente'),
    )
        ->where('t.ticket_id', '=', $id)
        ->get();

        $ticket_file = DB::table('ticket_file as t')
        ->join('tickets as t1', 't.ticket_id', '=', 't1.ticket_id')
        ->select('t.*')
        ->where('t.ticket_id', '=', $id)
        ->get();
        
        return response()->json([
            'ticket' => $ticket,
            'files' => $ticket_file
        ]);

    }

    public function update(Request $request, $ticketId)
    {
        $cate = $request->editCategoria;
       // dd($estado);
        $ticket = Ticket::findOrFail($ticketId);

        $ticket->categoria = $cate;
        $ticket->save();

        $notificacion = New Notificacion();
        $notificacion->remitente_id = auth()->user()->usuario_id;
        $notificacion->destinatario_id = $request->usuario;
        $notificacion->mensaje = "Se la asignado categoria al ticket con número: ". $request->num;
        $notificacion->estatus = 1;
        $notificacion->save();


        return redirect("/inbox")->with('success', 'Ticket actualizado correctamente');

    }

    public function antecedentes()
    {
        $tickets = DB::table('glpi_tickets as t')
    ->join('glpi_users as u', 't.users_id_lastupdater', '=', 'u.id')
    ->select('t.id as ticket_id', 't.*', DB::raw("CONCAT(u.realname, ' ', u.name, ' ', u.firstname) AS creator_name"))
    ->orderBy('t.id', 'desc')
    ->get();

   // dd($tickets);

    return view('rppc.antecedentes', compact('tickets'));
    }

    public function getTickets(Request $request)
    {
        // Obtiene el estado del ticket de la consulta, con '1' como valor predeterminado
        $estado = $request->query('estado', 1);

        // Filtra los tickets por el estado especificado
        $tickets = Ticket::where('estado', $estado)->get();

        // Retorna la lista de tickets como JSON
        return response()->json($tickets);
    }

    /**
     * Obtiene los detalles de un ticket específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTicketById($id)
    {
        // Encuentra el ticket por ID o retorna un error 404 si no existe
        $ticket = Ticket::findOrFail($id);

        // Retorna los detalles del ticket como JSON
        return response()->json($ticket);
    }
}

