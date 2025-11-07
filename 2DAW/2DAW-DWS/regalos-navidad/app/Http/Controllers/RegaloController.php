<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegaloController extends Controller
{
    /**
     * Mostrar todos los regalos.
     */
    public function index()
    {
        // Obtiene todos los regalos ordenados por ID descendente
        $regalos = DB::table('regalos')->orderBy('id', 'desc')->get();
        return view('index', compact('regalos'));
    }

    /**
     * Mostrar el formulario para crear un nuevo regalo.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Guardar un nuevo regalo en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // Inserta el nuevo registro (¡ojo con el -> en lugar de .!)
        DB::table('regalos')->insert([
            'name' => $request->name,
        ]);

        return redirect()->route('regalos.index')
                         ->with('success', 'Regalo agregado correctamente');
    }

    /**
     * Mostrar un regalo específico (opcional).
     */
    public function show(string $id)
    {
        $regalo = DB::table('regalos')->where('id', $id)->first();
        return view('show', compact('regalo'));
    }

    /**
     * Mostrar el formulario para editar un regalo.
     */
    public function edit(string $id)
    {
        $regalo = DB::table('regalos')->where('id', $id)->first();
        return view('edit', compact('regalo'));
    }

    /**
     * Actualizar un regalo existente.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        DB::table('regalos')->where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('regalos.index')
                         ->with('success', 'Regalo actualizado correctamente');
    }

    /**
     * Eliminar un regalo.
     */
    public function destroy(string $id)
    {
        DB::table('regalos')->where('id', $id)->delete();

        return redirect()->route('regalos.index')
                         ->with('success', 'Regalo eliminado correctamente');
    }
}