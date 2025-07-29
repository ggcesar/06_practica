@extends('layouts.app')

@section('content')
<div class="container">
{{-- Validación de errores --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>¡Errores!</strong><br>
            @foreach($errors->all() as $error)
                - {{ $error }} <br>
            @endforeach
        </div>
    @endif
<div class="card">
    <div class="card-header">Datos de la categoria</div>
    <div class="card-body">
        
    <form action="{{ url('categorias') }}" method="post" enctype="multipart/form-data">
@csrf
@include('categorias.form')
</form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

</div>
@endsection
