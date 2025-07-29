@extends('layouts.app')

@section('content')
<div class="container">

<div class="card">
    <div class="card-header">Editar producto</div>
    <div class="card-body">

    <form action="{{ route('productos.update',$productos->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')
@include('productos.form')
</form>

</div>
    <div class="card-footer text-muted"></div>
</div>
</div>
@endsection