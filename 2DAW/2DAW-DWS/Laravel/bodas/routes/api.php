<?php

use App\Http\Controllers\InvitadoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/invitados', [InvitadoController::class, 'getInvitados'])->middleware(islogged:class);
Route::post('/invitados', [InvitadoController::class,'createInvitado'])->middleware(islogged:class);
Route::put('/invitados', [InvitadoController::class,'replaceInvitado'])->middleware(islogged:class);
Route::patch('/invitados', [InvitadoController::class,'updateInvitado'])->middleware(islogged:class);
Route::delete('/invitados/{id}', [InvitadoController::class,'deleteInvitado'])->middleware(islogged:class);

/**
 * Para la siguiente clase deben traer:
 * 1. Ruta parametrizadas de put y patch y una extra con get
 * 2. Migracion "mesas"
 *      -capacidad(int)
 *      -posicion(string 32)
 *      - forma (enum 'cuadrada', 'redonda', 'rectangular')
 * 
 * Para ver:
 * - Route groups
 * - Resource APIs
 */