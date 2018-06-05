<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="container-fluid">
    <div class="container-fluid video">
        <img src="img/layer.jpg" alt="" id="bgvid">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="logo d-flex">
                <p class="text-center"><a class="align-items-center my-6 display-4 text-white" href="index.html"><h1>Auto-shop</h1></a>
                </p>
            </div>
            <div class="headText text-center col-12 ">
                <h1></h1>
            </div>
            <div id="polina" class="col-12 col-md-6">
                <h4 class="text-center">Crear una nueva cuenta</h4>
                <div class="social text-center">
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="btn btn-block btn-social btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-facebook']);">
                                <span class="fa fa-facebook"></span> ingresa con facebook
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-block btn-social btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google']);">
                                <span class="fa fa-google"></span> ingresa con Google
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h5>O</h5>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('register')}}">
                    {{ csrf_field() }}
                    <div class="form-group has-success has-feedback">
                        <div class="col-12">
                            <input type="text" class="form-control" name="name"placeholder="Nombre Completo" required>
                        </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="phone" placeholder="Telefono celular" required>
                        </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="password" placeholder="contrasena" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-center">creando una cuenta estas aceptando el <a class="text-light bg-dark" href="#">aviso de privacidad</a></p>
                       <button class="btn btn-outline-light  btn-lg" type="submit">Iniciar</button>

                    </div>
                </form>
                <br>
                <div class="text-right">
                    <p>ya tienes cuenta?   <a class="text-light bg-dark" href="login">Ingresa aqui </a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
-->

<link rel="stylesheet" href="{{asset('css/estilos.css')}} ">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}} "></script>
</body>
</body>
</html>
