@extends('layouts.app')

@section('content')
<div class="container">
{{-- Validación de errores --}}
    
<div class="card">
    <div class="card-header">Datos del producto</div>
    <div class="card-body">
        
    <form action="{{ url('productos') }}" method="post" enctype="multipart/form-data">

@csrf
@include('productos.form')
</form>
</div>
    <div class="card-footer text-muted"></div>
</div>
</div>
@endsection
