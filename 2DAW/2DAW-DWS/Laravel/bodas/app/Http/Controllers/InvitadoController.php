<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    public function getInvitados() {
        return 'Devuelvo todos los invitados desde controller.';
    }

    public function createInvitado(Request $request) {
        dd($request);
        return 'Crear invitado desde controller.';
    
    }


    public function deleteInvitado(Request $request, $id) {
        return 'Borro invitado con id $id desde controller.';

    }
}
