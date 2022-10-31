@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1 class="p-3 mb-2 mt-2 bg-dark text-white d-flex justify-content-center">Listado de Articulos</h1>
@stop

@section('content')
@include('includes.message')
<a href="/articulos/create" class="btn btn-primary mb-3 px-3">CREAR</a>

<!-- Tabla para mostrar los Articulos -->
<table id="articulos" class="table table-dark table-striped mt-5">
  <thead>
  <tr class="table-active">
      <th scope="col">ID</th>
      <th scope="col">Código</th>
      <th scope="col">Descripción</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precios</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
   
      @foreach($articles as $article)
     <tr class="table-active">
        <td>{{$article->id}}</td>
        <td>{{$article->code}}</td>
        <td>{{$article->description}}</td>
        <td>{{$article->amount}}</td>
        <td>{{$article->price}}</td>
        <td>
          <!-- Con formulario es otra forma de hacerlo sugerida en el tutorial -->
    <form action=" {{route ('articulos.destroy', $article->id)}}" method= "POST">

     <a href="/articulos/{{$article->id}}/edit" class="btn btn-info m-2">Editar</a>

         @csrf
         @method('DELETE')
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">Borrar</button>

   </form>
              
   </td>
    </tr>
      @endforeach
  </tbody>

</table>
  <!-- Esta es la forma del modal que yo he implementado -->
         <!-- the modal -->
         <!-- <div class="modal" id="myModal" tabindex="-1"> 
                            <div class="modal-dialog">

                                <div class="modal-content"> -->

                                 <!-- Modal Header -->
                                 <!-- <div class="modal-header">
                                    <h4 class="modal-title">Eliminar Articulo</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                 </div> -->

                                    <!-- Modal body -->
                                    <!-- <div class="modal-body">
                                      Si eliminas este Articulo no podrás recuperarlo luego, ¿Estás seguro que deseas eliminarlo?
                                   </div> -->

                                       <!-- Modal footer -->
                                     <!-- <div class="modal-footer">
                                      <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Volver</button>
                                      <a class="btn btn-danger btn-sm" href="{{route('articulos.delete', $article->id)}}">Eliminar Registro</a>
                                     </div>

                                </div>
                            </div>
          </div> -->

  @stop

 @section('css')
    <link rel="stylesheet" href="css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready( function () {
    $('#articulos').DataTable();
  } );
</script>

@stop
  
