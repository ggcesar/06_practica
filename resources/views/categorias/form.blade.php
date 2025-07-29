<div class="mb-3">
<label for="nombre" class="form-label">Nombre:</label>
    <input
        type="text"
        class="form-control"
        name="nombre"
        id="nombre"
        value="{{ isset($categoria->nombre) ? $categoria->nombre : old('nombre') }}"
        placeholder="Ingrese el nombre de la categoría"
    />
</div>

<div class="mb-3">
<label for="descripcion" class="form-label">Descripcion:</label>
    <input
        type="text"
        class="form-control"
        name="descripcion"
        id="descripcion"
        value="{{ isset($categoria->descripcion) ? $categoria->descripcion : old('descripcion') }}"
        placeholder="Ingrese la descripción"
    />
</div>

<br>
<input type="submit" class="btn btn-success" value="Enviar"/>
<a href="{{ route('categorias.index') }}" class="btn btn-primary">Regresar</a>