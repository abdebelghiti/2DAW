<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Regalos')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">
    <nav class="bg-indigo-600 text-white px-6 py-4 shadow-md flex justify-between">
        <h1 class="font-bold text-lg">🎁 Regalos</h1>
        <div>
            <a href="{{ route('regalos.index') }}" class="hover:underline mx-2">Inicio</a>
            <a href="{{ route('regalos.create') }}" class="hover:underline mx-2">Agregar</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center text-sm py-4 text-gray-500 border-t mt-8">
        © {{ date('Y') }} Regalos App — Laravel + Tailwind
    </footer>
</body>
</html>