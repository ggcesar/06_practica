@extends('layouts.app')
@section('content')
<div class="container mt-3">
        <h2>Enviar Correo de Bienvenida</h2>
        <form action="{{ route('mensaje.enviar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre"
                    id="nombre"
                    placeholder="Ingrese el nombre"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="Ingrese el email"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje:</label>
                <textarea
                    class="form-control"
                    name="mensaje"
                    id="mensaje"
                    placeholder="Ingrese el mensaje"
                    required
                ></textarea>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input
                    type="text"
                    class="form-control"
                    name="telefono"
                    id="telefono"
                    placeholder="Ingrese el teléfono"
                />
            </div>

            <input type="submit" class="btn btn-success" value="Enviar"/>
        </form>
    </div>
</body>
</html>
@endsection