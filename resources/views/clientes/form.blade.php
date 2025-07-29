<div class="mb-3">
<label for="nombre" class="form-label">Nombre:</label>
    <input
        type="text"
        class="form-control"
        name="nombre"
        id="nombre"
        value="{{ isset($cliente->nombre) ? $cliente->nombre : old('nombre') }}"
        placeholder="Ingrese el nombre del cliente"
    />
</div>

<div class="mb-3">
<label for="apellido" class="form-label">Apellido:</label>
    <input
        type="text"
        class="form-control"
        name="apellido"
        id="apellido"
        value="{{ isset($cliente->apellido) ? $cliente->apellido : old('apellido') }}"
        placeholder="Ingrese el apellido del cliente"
    />
</div>

<div class="mb-3">
<label for="email" class="form-label">Email:</label>
    <input
        type="text"
        class="form-control"
        name="email"
        id="email"
        value="{{ isset($cliente->email) ? $cliente->email : old('email') }}"
        placeholder="Ingrese el email del cliente"
    />
</div>

<div class="mb-3">
<label for="telefono" class="form-label">Telefono:</label>
    <input
        type="text"
        class="form-control"
        name="telefono"
        id="telefono"
        value="{{ isset($cliente->telefono) ? $cliente->telefono : old('telefono') }}"
        placeholder="Ingrese el telefono del cliente"
    />
</div>

<div class="mb-3">
<label for="direccion" class="form-label">Direccion:</label>
    <input
        type="text"
        class="form-control"
        name="direccion"
        id="direccion"
        value="{{ isset($cliente->direccion) ? $cliente->direccion : old('direccion') }}"
        placeholder="Ingrese la direccion del cliente"
    />
</div>

<br>
<input type="submit" class="btn btn-success" value="Enviar"/>
<a href="{{ route('clientes.index') }}" class="btn btn-primary">Regresar</a>