<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrutasController extends Controller
{
    public function index() {

        $frutas = [
            ['id' => 1,'Nombre'=> 'Manzana', 'Categoria' => 'Fruta de pepita'],
            ['id' => 2,'Nombre'=> 'Naranja', 'Categoria' => 'Cítrico'],
            ['id' => 3,'Nombre'=> 'Pera', 'Categoria' => 'Fruta de pepita']
        ];

        return view('frutas', compact('frutas'));
    }
}
