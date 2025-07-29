@extends('layouts.app')

@section('content')
<div class="container">

<div class="card">
    <div class="card-header">Editar clientes</div>
    <div class="card-body">

    <form action="{{ route('clientes.update',$cliente->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')
@include('clientes.form')
</form>

</div>
    <div class="card-footer text-muted"></div>
</div>
</div>
@endsection