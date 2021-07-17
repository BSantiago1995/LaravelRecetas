@extends('layouts.app')
<!-- Estilos-->
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
@endsection
@section('botones')
    <a class="btn btn-primary" href="{{route('recetas.index')}}">Volver a Receta</a>
@endsection

@section('content')
{{$receta}}
    <h2 class="text-center mb-3">Editar Recetas: {{$receta->nombre}}</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{route('recetas.update', ['receta'=>$receta->id])}}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form group mt-3">
                <label for="nombre">Nombre Recetas</label>
                <input type="text"  name="nombre" class="form-control
                @error('nombre') is-invalid @enderror" 
                id="nombre"  value="{{$receta->nombre}}"><!--old para mantener el nombre y el error para que marque la casilla -->
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                </div>
                <div class="form group mt-3">
                    <label>Categorias</label>
                    <select name='categorias' id='categorias' class="form-control @error('categorias') is-invalid @enderror">
                        <option value="" disabled selected>Seleccione</option>
                        @foreach ($categorias as $id=> $categoria)
                            <option value={{$id}} {{$receta->categoria_id==$id ? 'selected' : ''}}>{{$categoria}}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
               </div>
                <div class="form group mt-3">
                    <label for="ingrediente">Ingredientes</label>
                    <input type="hidden"  name="ingrediente" class="form-control " id="ingrediente" value={{$receta->ingredientes}}>
                    <trix-editor input="ingrediente" class="form-control @error('ingrediente') is-invalid @enderror"></trix-editor>
                    @error('ingrediente')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                    </div>

                    <div class="form group mt-3">
                        <label for="preparacion">Preparación</label>
                        <input type="hidden"  name="preparacion" class="form-control" id="preparacion" value="{{$receta->preparacion}}">
                        <trix-editor input="preparacion" class="form-control @error('preparacion') is-invalid @enderror"></trix-editor>
                        @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="imagen">Imagen</label>
                            <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen">
                            <div>
                                <p>Imagen</p>
                                <img src="/storage/{{$receta->imagen}}" style='width:300px'>
                            </div>
                            @error('imagen')
                            <span class='invalid-feedback d-block' role='alert'>
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                <div class="form group mt-3">
                    <input type="submit" class="btn btn-primary" value="Editar receta">
                </div>
            </form>
        </div>
    </div>
@endsection
<!-- script-->
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>   
@endsection