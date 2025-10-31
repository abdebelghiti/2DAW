<?php

use App\Http\Controllers\FrutasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/saludo/{nombre?}', function ($nombre) {
    return "Hola $nombre, Bienvenido a mi aplicación!";
});*/

Route::get('/saludo/{nombre?}/{edad?}', function ($nombre = 'Invitado', $edad = null) {

    if ($edad) {
        return "Hola, $nombre. Tienes $edad años";
    } else {
        return "Hola, $nombre";
    }

})->where([
    'nombre' => '[A-Za-z]+',
    'edad' => '[0-9]+'
]);

Route::get('/frutas', [FrutasController::class,'index']);



//Hacer para el próximo día
Route::middleware('asegurarFrutas')->group(function() {
    
});