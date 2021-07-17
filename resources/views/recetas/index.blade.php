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
                <td>{{$usuarioReceta -> categoriaReceta -> nombre}}</td>
                <td>
                    <a href="{{route('recetas.show',['receta'=>$usuarioReceta ->id])}}" class="btn btn-success">Ver</a>
                    <a href="{{route('recetas.edit',['receta'=>$usuarioReceta ->id])}}" class="btn btn-dark">Editar</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
             </tr>    
            @endforeach
        </tbody>
    </table>
</div>
@endsection

