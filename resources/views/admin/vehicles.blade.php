@extends('layout')
@section('vehicles','users')
@section('content')
    <link rel="stylesheet" href="{{asset('css/vehiclesStyle.css')}}">
    <div class="container-fluid">
        <div class="row pt-0 mt-0">
            <div class="col-4 text-center px-0 py-0 mx-0 my-0 shadow">
                <button onclick="addCita()" class="btn btn-outline-secondary btn-block btn-lg">
                    Agregar
                </button>
            </div>
           </div>
        </div>
        <div class="row">

            @foreach($vehicles as $vehicle)

                <div class=" col-md-4  col-12">
                    <div class="card hovercard">
                        <div class="cardheader">
                        </div>
                        <div class="avatar">
                            <img alt="" src="{{asset('img/vehicle.png')}} ">
                        </div>
                        <div class="info">
                            <div class="title">
                                <a target="_blank" href="#">{{$users->where('id',$vehicle->user_id)->first()->name }}</a>
                            </div>
                            <div class="desc">{{$vehicle->marca}}</div>
                            <div class="desc">{{$vehicle->submarca}}</div>
                            <div class="desc">{{$vehicle->modelo}}</div>
                            <div class="desc">{{$vehicle->color}}</div>

                        </div>
                        <div class="bottom">
                            <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" rel="publisher"
                               href="https://plus.google.com/+ahmshahnuralam">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" rel="publisher"
                               href="https://plus.google.com/shahnuralam">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                                <i class="fa fa-behance"></i>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach





        </div>
    </div>

    <div class="container-fluid col-md-6 col-8 " id="createCita" >
        <form action="{{url('addVehicle')}}/" method="post">
            {{ csrf_field() }}
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Numero de placas</label>
                    <input type="text" class="form-control" name="placas" placeholder="JEG4202">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Marca</label>
                    <input type="text" class="form-control" id="celphone" name="marca" placeholder="Nissan">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="inputdate">submarca</label>
                    <input type="text" class="form-control" name="submarca" id="inputdate" placeholder="Sentra">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputdate">Modelo </label>
                    <input type="number" class="form-control" name="modelo" id="inputdate" placeholder="2006">
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Color</label>
                    <input type="text" class="form-control" name="color" placeholder="Negro">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Cliente</label>
                    <input type="text" class="form-control" id="celphone" name="user_ud" placeholder="pedro">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Acepto el aviso de privasidad
                    </label>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <button type="submit" class="btn btn-dark  " id="btnEnviarCita">Enviar</button>
                </div>
                <div class="col-6">
                    <button type="reset" class="btn btn-dark  mr-2" id="btnCancelarCita" onclick="closeCita()">Cancelar</button>
                </div>

            </div>
        </form>
    </div>

    <script type="text/javascript">
        function addCita() {
            $("#createCita").fadeToggle(2000);
        }
        function closeCita() {
            $("#createCita").fadeOut(2000);
        }

        function verDisponibilidad() {
            var x = document.getElementById("inputdate").value;
            var i;
            for (i = 9; i<18;i++){
                document.getElementById("horario").innerHTML = "<option value='horarios Disponibles'>" + i + ":00hrs </option>";
            }

        }
    </script>
@endsection
