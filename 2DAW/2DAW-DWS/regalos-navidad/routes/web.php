<?php

use App\Http\Controllers\RegaloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/regalos', [RegaloController::class, 'index'])->name('regalos.index');
Route::get('/regalos/create', [RegaloController::class, 'create'])->name('regalos.create');
Route::post('/regalos', [RegaloController::class, 'store'])->name('regalos.store');
Route::get('/regalos/{regalo}', [RegaloController::class, 'show'])->name('regalos.show');
Route::get('regalos/{regalo}/edit', [RegaloController::class, 'edit'])->name('regalos.edit');
Route::put('regalos/{regalo}', [RegaloController::class, 'update'])->name('regalos.update');
Route::delete('regalos/{regalo}', [RegaloController::class, 'destroy'])->name('regalos.destroy');

