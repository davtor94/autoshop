@extends('layout')
@section('appoinments')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <script type="text/javascript" src="{{url('\js\sidenav.js')}}"></script>

        </div>
        <div id="main">
            <h1 class="text-center">Citas Pasadas</h1>
            <div class="row">
                <div class="col-md-2 col-12">


                </div>
                <div class="col-md-8 col-12">

                    @foreach($appoinments as $appoinment)
                        @php($vehicle = App\Models\Vehicle::where('id',$appoinment->vehicle_id)->get()->first())

                        <div class="card text-white bg-secondary mb-3 shadow">
                            <div class="card-header text-center">
                                Cita
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Descripcion: {{$appoinment->descripcion}}</h5>
                                <p class="card-text">Vehiculo: {{  $vehicle->marca.' '. $vehicle->submarca. ' '.$vehicle->modelo}}.</p>
                                <p class="card-text">Placas: {{$vehicle->placas}}.</p>
                                <p class="card-text">Hora acordada: {{$appoinment->hora}}.</p>
                                <p class="text-center my-0"><a href="{{action('AdminController@cobrar',['user_id'=> $vehicle->user_id,'cita_id'=> $appoinment->id])}}
                                            " class="btn btn-outline-light  btn-lg">Cobrar</a> </p>
                            </div>
                            <div class="card-footer text-white  text-center">
                                Fecha: {{$appoinment->fecha}}
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>


@endsection
<link rel="stylesheet" href="{{asset('css/slidenav.css')}}">

