<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comentario;

class ComentarioPublicado implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comentario;

    public function __construct(Comentario $comentario)
    {
        $this->comentario = $comentario;
    }

    public function broadcastOn()
    {
        return new Channel('resolucion-' . $this->comentario->resolucion_id);
    }

    public function broadcastAs()
    {
        return 'nuevo-comentario';
    }

    public function broadcastWith()
    {
        return [
            'comentario' => [
                'id' => $this->comentario->id,
                'contenido' => $this->comentario->contenido,
                'usuario' => [
                    'name' => $this->comentario->usuario->name
                ]
            ]
        ];
    }
}
