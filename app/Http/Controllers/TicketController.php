<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\TicketFile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        Carbon::setLocale('es');

        $users = User::all();

        $tickets = DB::table('tickets as t')
        ->join('usuarios as u', 't.usuario_id', '=', 'u.usuario_id')
        ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
        ->select('t.*',                
        DB::raw('CONCAT(p.nombre, " ", p.ape_materno, " ", p.ape_paterno) AS remitente'),
        )
        ->where('u.usuario_id', '=', auth()->user()->usuario_id)
        ->get();

        foreach ($tickets as $ticket)
        {
            $user = User::find($ticket->remitente_id);
            $nombre = $user->persona->nombre . ' ' . $user->persona->ape_paterno;
            $ticket->remitente_id = $nombre;
            $ticket->fecha_aper = Carbon::parse($ticket->fecha_aper)->translatedFormat('j \d\e F \d\e Y');
        }


    //dd($tickets);

        return view('rppc.tickets.ticket-inbox', compact('tickets', 'users'));

    }

    public function store(Request $request) 
    {

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

        $ticket->usuario_id = $request->usuario_id;
        $ticket->titulo = $request->titulo;
        $ticket->nu_ticket = $nu_ticket;
        $ticket->fecha_aper = $request->fecha_apertura;
        $ticket->fecha_lim = $request->fecha_limite;
        $ticket->tipo = $request->tipo;
        $ticket->categoria = $request->categoria;
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
    DD($ticket);
    return back();
    }
}
