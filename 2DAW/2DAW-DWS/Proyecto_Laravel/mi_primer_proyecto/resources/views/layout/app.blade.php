<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
    </nav>

    <hr>

    <div class="container">
        {{-- Es una zona vacía que cada vista rellenará con su propio contenido --}}
        @yield('content')
    </div>
</body>
</html>