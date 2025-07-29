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
    <div class="card-header">Datos del cliente</div>
    <div class="card-body">
        
    <form action="{{ url('clientes') }}" method="post" enctype="multipart/form-data">
@csrf
@include('clientes.form')
</form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

</div>
@endsection
