<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #007bff;
            margin: 0;
        }

        .content {
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #eee;
            margin-top: 30px;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>¡Bienvenido!</h1>
        </div>

        <div class="content">
            <p>Hola <strong>{{ $nombre }}</strong>,</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            @if($telefono)
                <p><strong>Teléfono:</strong> {{ $telefono }}</p>
            @endif
            <p><strong>Mensaje:</strong></p>
<p>{{ $mensaje }}</p>
        </div>

        <div class="footer">
            <p>Este correo fue enviado desde {{ config('app.name') }}</p>
            <p>Si tienes preguntas, no dudes en contactarnos.</p>
        </div>
    </div>
</body>
</html>