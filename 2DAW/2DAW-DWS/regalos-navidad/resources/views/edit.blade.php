@extends('layouts.app')

@section('title', 'Editar Regalo')

@section('content')
<div class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold mb-4">Editar regalo</h2>

    <form action="{{ route('regalos.update', $regalo->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium text-gray-700">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $regalo->name) }}" 
                   class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('regalos.index') }}" class="mr-3 text-gray-600 hover:underline">Cancelar</a>
            <button type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
