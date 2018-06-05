<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style  >
        .fondo{background: blue;}
        .slider{
            background: url("img/layer.jpg");
            background-size: cover;
            background-position: center;
            height: 440px;
        }

    </style>
    <title>@yield('title') - AutoShop  </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mr-auto text-center fixed-top">
    <a class="navbar-brand" href="{{url('/index')}}">
        <img src="/img/icon.png" width="30" height="30" class="d-inline-block align-top " alt="">
        AutoShop
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/index')}}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/citas')}}">Citas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/vehicles')}}">Vehiculos</a>
            </li>
            @if(Auth::id() == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/customers')}}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/backup')}}">Respaldos</a>
                </li>
            @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Historial
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!--  <a class="dropdown-item" href="#">Clientes</a>  -->
                    <a class="dropdown-item" href="{{url('/historial')}}">Historial</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('/contacto')}}">ayuda</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="btn btn-danger" href="{{url('/contacto')}}">Contacto</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profile.html">ver perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        Cerrar Sesion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid slider justify-content-center d-flex  item align-items-center">
    <div class="text-white text-center">
        <h1 class="display-3">AutoShop</h1>
    </div>
</div>

<div class="container-fluid">
@yield('content')
</div>
<footer class="container-fluid bg-dark text-white py-3 text-center">
    <p>Created by David Torres </p>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<link rel="stylesheet" href="{{asset('css/slidenav.css')}}">
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
