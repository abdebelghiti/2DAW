@extends('layouts.app')

@section('title', 'Lista de Regalos')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Lista de Regalos</h2>
    <a href="{{ route('regalos.create') }}" 
       class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
       ➕ Nuevo Regalo
    </a>
</div>

@if ($regalos->isEmpty())
    <p class="text-gray-600">No hay regalos registrados todavía.</p>
@else
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full text-left border border-gray-200">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-gray-700 font-semibold">ID</th>
                    <th class="px-6 py-3 text-gray-700 font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-gray-700 font-semibold text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regalos as $regalo)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $regalo->id }}</td>
                        <td class="px-6 py-3">{{ $regalo->name }}</td>
                        <td class="px-6 py-3 text-right space-x-2">
                            <a href="{{ route('regalos.edit', $regalo->id) }}" 
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('regalos.destroy', $regalo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Eliminar regalo?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
