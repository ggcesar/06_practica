@extends('layouts.app')

@section('content')
<div class="container">

<div class="card">
    <div class="card-header">Editar categoria</div>
    <div class="card-body">

    <form action="{{ route('categorias.update',$categoria->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')
@include('categorias.form')
</form>

</div>
    <div class="card-footer text-muted"></div>
</div>
</div>
@endsection