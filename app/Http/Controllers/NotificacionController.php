<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacion;


class NotificacionController extends Controller
{
    public function update(Request $request, $notId) {

        $notificacion = Notificacion::findOrFail($notId);

        $notificacion->estatus = 2;
        $notificacion->save();

    return redirect("/inbox");
    }
}
