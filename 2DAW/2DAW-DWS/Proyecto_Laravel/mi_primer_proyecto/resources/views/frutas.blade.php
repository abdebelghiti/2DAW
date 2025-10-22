<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de frutas</title>
</head>
<body>
    <h1>Listado de Frutas</h1>

    <ul>
        @foreach ($frutas as $fruta)
            <li>{{ $fruta['Nombre'] }} ({{ $fruta['Categoria'] }})</li>
        @endforeach
    </ul>
    
</body>
</html>