@extends('layouts.app')

@section('content')
<!-- imprime la variable llavellave $receta llavellave-->
<article class="contenido-receta">
    <h1 class="text-center mb-4">{{$receta->nombre}}</h1>
    <div class="imagen-receta" align="center">
        <img src="/storage/{{$receta->imagen}}" class="w-65">
    </div>
    
    <div class="receta-data">
        <p>
            <span class="font-weight-bold text-primary">Categoria:</span>{{$receta->categoriaReceta->nombre}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Autor:</span>{{$receta->autorReceta->name}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Fecha creación:</span>{{date('d-m-Y', strtotime($receta->created_at))}}
        </p>
    </div>
    <div class="ingredientes">
        <h2 class="my-3 text-primary">Ingredientes</h2>
        {!!$receta->ingredientes!!}
    </div>
    <div class="preparacion">
        <h2 class="my-3 text-primary">Preparacion</h2>
        {!!$receta->preparacion!!}
    </div>
</article>
@endsection