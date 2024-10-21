<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\TicketFile;
use App\Models\User;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function index()
    {

        $tickets = Ticket::all();
        $users = User::all();

        return view('rppc.tickets.ticket-inbox', compact('tickets', 'users'));

    }

    public function store(Request $request) 
    {

        $request->validate([
            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Ajusta según tus necesidades
        ]);

        $ticket = new Ticket();

        $ticket->usuario_id = $request->usuario_id;
        $ticket->titulo = $request->titulo;
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
            $path = $file->store('archivos', 'ftp'); // Usa el disco FTP
            
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
