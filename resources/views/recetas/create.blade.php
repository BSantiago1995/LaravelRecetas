@extends('layouts.app')

@section('botones')
    <a class="btn btn-primary" href="{{route('recetas.index')}}">Volver a Receta</a>
@endsection

@section('content')
    <h2 class="text-center mb-3">Crear Recetas</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{route('recetas.store')}}" novalidate>
                @csrf
                <div class="form group">
                <label for="nombre">Nombre Receta</label>
                <input type="text"  name="nombre" class="form-control
                @error('nombre') is-invalid @enderror" 
                id="nombre" placeholder="Nombre Receta" value={{old('nombre')}}><!--old para mantener el nombre y el error para que marque la casilla -->
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                </div><br>
                <div class="form group">
                    <input type="submit" class="btn btn-primary" value="Agregar receta">
                </div>
            </form>
        </div>
    </div>
@endsection