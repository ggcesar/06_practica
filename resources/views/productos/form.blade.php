<div class="mb-3">
    <label for="marca" class="form-label"> Marca: </label>
    <input
        type="text"
        class="form-control"
        name="marca"
        id="marca"
        value="{{ isset($productos->marca)?$productos->marca:''}}"
        aria-describedby="helpId"
        placeholder="Ingrese la marca del producto"
    />
</div>

<div class="mb-3">
    <label for="modelo" class="form-label"> Modelo: </label>
    <input
        type="text"
        class="form-control"
        name="modelo"
        id="modelo"
        value="{{ isset($productos->modelo)?$productos->modelo:''}}"
        aria-describedby="helpId"
        placeholder="Ingrese el modelo del producto"
    />
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label"> Descripcion: </label>
    <input
        type="text"
        class="form-control"
        name="descripcion"
        id="descripcion"
        value="{{ isset($productos->descripcion)?$productos->descripcion:''}}"
        aria-describedby="helpId"
        placeholder="Ingrese la descripcion del producto"
    />
</div>

<div class="mb-3">
    <label for="cantidad" class="form-label"> Cantidad: </label>
    <input
        type="number"
        class="form-control"
        name="cantidad"
        id="cantidad"
        value="{{ isset($productos->cantidad)?$productos->cantidad:''}}"
        aria-describedby="helpId"
        placeholder="Ingrese la cantidad del producto"
    />
</div>

<div class="mb-3">
    <label for="precio" class="form-label"> Precio: </label>
    <input
        type="number"
        class="form-control"
        name="precio"
        id="precio"
        value="{{ isset($productos->precio)?$productos->precio:'' }}"
        aria-describedby="helpId"
        placeholder="Ingrese el precio del producto"
    />
</div>

<div class="mb-3">
    <label for="categoria_id" class="form-label"> Categoria: </label>
    <select class="form-select" name="categoria_id" id="categoria">
        <option value="">Seleccione una categoria</option>
        @forelse($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ isset($productos->categoria_id) && $productos->categoria_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @empty
            <option value="">No hay categorias disponibles</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label for="imagen" class="form-label"> Imagen: </label>
    @if(isset($productos->imagen))
    <br>
    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$productos->imagen) }}" alt="" width="100">
<br>
</br>
    @endif 
    <input
        type="file"
        class="form-control"
        name="imagen"
        id="imagen"
        aria-describedby="helpId"
        placeholder="Seleccione una imagen"
    />
</div>

<br>
<input type="submit" class="btn btn-success" value="Enviar"/>
<a href="{{ route('productos.index') }}" class="btn btn-primary">Regresar</a>
