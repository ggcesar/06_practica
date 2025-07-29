@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Mensaje</strong> {{ session('mensaje') }}
        </div>
    @endif
    <br/>
    <div class="card">
        <div class="card-header d-flex">
            <div class="me-1">
                <a href="{{ route('productos.create') }}" class="btn btn-success">Subir Producto</a>
            </div> 
            <div class="me-1">
            <a href="{{ route('productos.pdf') }}" class="btn btn-danger" target="_blank">Descargar PDF Inventario</a>
            </div>

            <form class="ms-auto" action="{{ route('productos.index') }}" method="GET">
                @csrf
                <div class="input-group mb-3">
                    <select class="form-select" name="categoria" id="categoria">
                        <option value="">Seleccione una categoria</option>
                        @forelse($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ (isset($buscarCategoria) && $buscarCategoria == $categoria->id) ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @empty
                            <option value="">No hay categorias disponibles</option>
                        @endforelse
                    </select>
                    <input
                        type="text"
                        class="form-control"
                        name="buscar"
                        id="buscarpor"
                        value="{{ isset($buscarpor) ? $buscarpor : '' }}"
                        placeholder="Escribe un nombre para buscar"
                    />
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table customize-table mb-0 v-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->marca }}</td>
                                <td>{{ $producto->modelo }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>
                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$producto->imagen) }}" alt="" width="100">
                                </td>
                                <td>
                                    {{ $producto->categoria->nombre }}
                                </td>
                                <td>
                                    <div class="dropdown dropstart btn-group">
                                        <a id="btn-edit" href="{{ route('productos.edit', $producto->id) }}"
                                            style="padding: 3px 20px; font-size: 14px;" class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Editar">
                                           <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a id="btn-destroy" href="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;"
                                            style="padding: 3px 20px; font-size: 14px;" 
                                            class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                            title="{{ trans('panel.acciones.borrar') }}"
                                            data-bs-target="#dialog-destroy" data-bs-toggle="modal">
                                           <i class="far fa-trash-alt remove-note"></i>
                                        </a>

                                          

  
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No hay productos disponibles</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted">
            {!! $productos->links() !!}
        </div>
    </div>
</div>
@endsection