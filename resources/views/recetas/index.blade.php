@extends('layouts.app')
@section('botones')
    <a class="btn btn-success" href="{{route('recetas.create')}}">Crear Receta</a>
@endsection

@section('content')
<h2 class="text-center mb-3">Administra tus Recetas</h2>
<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
       <thead class="bg-info text-ligth">
           <tr>
               <th scole="col">Nombre</th>
               <th scole="col">Categoria</th>
               <th scole="col">Acciones</th>
           </tr>
        </thead> 
        <tbody>
            @foreach ($userRecetas as $usuarioReceta)
            <tr>
                <td>{{$usuarioReceta -> nombre}}</td>
                <td>{{$usuarioReceta -> categoria_id}}</td>
                <td>
                    <a href="" class="btn btn-success">Ver</a>
                    <a href="" class="btn btn-dark">Actualizar</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
             </tr>    
            @endforeach
        </tbody>
    </table>
</div>
@endsection

