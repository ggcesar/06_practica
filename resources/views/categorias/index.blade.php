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
                <a href="{{ route('categorias.create') }}" class="btn btn-success">Agregar Categoria</a>
            </div>
            <form class="ms-auto" action="{{ route('categorias.index') }}" method="GET">
                @csrf
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="buscar"
                        id="buscarpor"
                        request="buscar"
                        value="{{ isset($buscarpor) ? $buscarpor : '' }}"
                        placeholder="Buscar por nombre o descripcion"
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>
                                    <div class="dropdown dropstart btn-group">
                                        <a id="btn-edit" href="{{ route('categorias.edit', $categoria->id) }}"
                                            style="padding: 3px 20px; font-size: 14px;" class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Editar">
                                           <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a id="btn-destroy" href="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;"
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
                                <td colspan="8" class="text-center">No hay categorias disponibles</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted">
            {!! $categorias->links() !!}
        </div>
    </div>
</div>
@endsection


