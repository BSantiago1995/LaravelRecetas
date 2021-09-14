
@extends('layouts.app')
@section('botones')
    @include('Ui.Navegacion')
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
                    <div class="row">
                    <div class="col-md-3"> <a href="{{route('recetas.show',['receta'=>$usuarioReceta ->id])}}" class="btn btn-success d-block">Ver</a></div>
                    <div class="col-md-3"><a href="{{route('recetas.edit',['receta'=>$usuarioReceta ->id])}}" class="btn btn-dark d-block">Editar</a></div>
                    <div class="col-md-3">
                        
                        <!-- se envuelve en un form puesto que no tiene ruta
                        <form method="POST" action="{{route('recetas.destroy',['receta'=>$usuarioReceta ->id])}}">
                            @csrf
                            @method('delete') no se lo ubica asi puesto que se va integrar sweetalert
                            el boton se pasa como componente-->
                        <eliminar-receta recetas-id={{$usuarioReceta->id}}></eliminar-receta>
                        <!--</form>-->
                    </div>
                    </div>
                </td>
             </tr>    
            @endforeach
        </tbody>
    </table>
</div>
@endsection

