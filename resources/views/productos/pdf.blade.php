<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Inventario</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; font-size: 12px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Reporte de Inventario</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->marca }}</td>
                <td>{{ $producto->modelo }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->categoria->nombre ?? '' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>