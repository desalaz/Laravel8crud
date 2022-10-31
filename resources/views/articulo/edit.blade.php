@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
<h1 class="p-3 mb-2 mt-2 bg-dark text-white d-flex justify-content-center">Editar registros</h1>
@stop

@section('content')
<h2>Editar:</h2>

<form action="/articulos/{{$article->id}}" method="POST">
    @csrf
    @method('PUT')
    
  <div class="mb-3">
    <label for="Código" class="form-label">Código</label>
    <input type="text" class="form-control" id="code"  name="code" value="{{$article->code}}">
  </div>
  
  <div class="mb-3">
    <label for="descripción" class="form-label">Descripción</label>
    <input type="tex" class="form-control" id="description" name="description" value="{{$article->description}}">
  </div>
  <div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad</label>
    <input type="number" class="form-control" id="amount" name="amount" value="{{$article->amount}}">
  </div>
  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{$article->price}}">
  </div>
  
  <div class="d-flex justify-content-center">
  <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>

  <button type="submit" class="btn btn-primary mx-2">Modificar</button>
  </div>
</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop