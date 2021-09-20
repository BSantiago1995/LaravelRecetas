@extends('layouts.app')

@section('content1')
    <div class="row">
        <div class="col-md-12">
            <div class="card img-fluid" style="width:100%">
            <img class="imagen-fondo" src="/storage/fondo/pexels-roman-odintsov-4552046.jpg" width="100%" >
            <div class="card-img-overlay">
                <h1 class="card-title text-white display-2 font-weight-bold text-center">Healthy 
                    <br> &nbsp;&nbsp; & Fast</h1>
                <div class="col-md-4">
                <p class="card-text text-white font-weight-fantasy align-items-left">
                    Podrá disfrutar de un ambiente tranquilo y agradable, así como degustar de los más variados 
                    y exquisitos platos de comida nacional e internacional, ideal para los amantes de la elegancia 
                    y el confort, además la dulce vibración que emite el piano todas las noches, 
                    termina de complementar el encanto del lugar acompañado por sus platos fuertes
                    <br>Ideal para los amantes de la elegancia y el confort, además la dulce vibración
                     que emite el piano todas las noches.
                 </p>
                 <a class="btn btn-outline-success btn-block text-uppercase font-weight-bold" href="{{route('recetas.index')}}">
                    <svg class="icono" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                      </svg>
                    Vistar</a>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="{{route('recetas.create')}}">Crear receta</a></li>
                        <li><a href="#">Perfil</a></li>
                        <li><a href="{{route('recetas.index')}}">Recetas</a></li>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3>Healthy & fast</h3>
                    <p>
                        Brindar a nuestros clientes una experiencia única e inolvidable. Crear un ambiente 
                        acogedor con servicio que haga que nuestros clientes se sientan como en casa. 
                        Ofrecer productos e ingredientes, locales & regionales, frescos y de alta calidad. 
                        Brindar un servicio eficiente, cálido, con carisma y excelente asesoría.
                    </p>
                </div>
                <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
            </div>
            <p class="copyright">BSOrtiz © 2021</p>
        </div>
    </footer>
</div>
@endsection