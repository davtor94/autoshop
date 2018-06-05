@extends('layout')
@section('appoinments','vehicles')
@section('content')
    @php($opcitons = "" )
    @foreach($vehicles as $vehicle)
        @php($opcitons.= "<option value='$vehicle->id' > $vehicle->placas </option>")
    @endforeach
    <div class="container-fluid">
        <div class="row">
            <script type="text/javascript" src="{{url('\js\sidenav.js')}}"></script>

        </div>
        <div id="main">
            <h1 class="text-center">Citas Próximas</h1>
            <div class="row">
                <div class="col-md-3 col-12">
                    <button class="btn btn-outline-dark btn-block btn-lg shadow" onclick="addCita()" >Agregar</button>


                </div>
                <div class="col-md-9 col-12">

                    @foreach($appoinments as $appoinment)
                        @php($vehicle = App\Models\Vehicle::where('id',$appoinment->vehicle_id)->get()->first())

                        <div class="card text-white bg-secondary mb-3 shadow">
                            <div class="card-header text-center">
                                Proxima cita
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Descripcion: {{$appoinment->descripcion}}</h5>
                                <p class="card-text">Vehiculo: {{  $vehicle->marca.' '. $vehicle->submarca. 'Modelo: '.$vehicle->modelo}}.</p>
                                <p class="card-text">Placas: {{$vehicle->placas}}.</p>
                                <p class="card-text">Hora acordada:{{$appoinment->hora}}.</p>
                                <p class="text-center my-0"><a href="{{action('AdminController@cobrar',['user_id'=> $vehicle->user_id,'cita_id'=> $appoinment->id])}}
                                            " class="btn btn-outline-light  btn-lg">Cobrar</a> </p>
                            </div>
                            <div class="card-footer text-white  text-center">
                                Fecha acordada: {{$appoinment->fecha}}
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid col-md-6 col-8 " id="createCita" >
        <form action="{{url('addcitas')}}/" method="post" >
            {{ csrf_field() }}
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Numero de placas </label>
                    <select class="form-control" name="vehicle_id">
                        <?php echo $opcitons;?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Numero telefono</label>
                    <input type="number" class="form-control" id="celphone">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion de la falla</label>
                <textarea class="form-control" id="textarea1" rows="2" name="descripcion"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputdate">Dia</label>
                    <input type="date" class="form-control" name="fecha" id="inputdate" onchange="verDisponibilidad()">
                </div>
                <div class="form-group col-md-4">
                    <label for="horario">Horario Disponible</label>
                    <select id="horario" class="form-control" name="hora" >
                        <option value="n/a">horarios Disponibles</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Enviar correo al ser confirmada la cita
                    </label>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary  " id="btnEnviarCita">Enviar</button>
                </div>
                <div class="col-6">
                    <button type="reset" class="btn btn-primary  mr-2" id="btnCancelarCita" onclick="closeCita()">Cancelar</button>
                </div>

            </div>
        </form>
    </div>
@endsection

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
        var horarios = "";
        for (i = 9; i<18;i++){
            horarios += "<option value='"+i+":00hrs'>" + i + ":00hrs </option>";
        }
        document.getElementById("horario").innerHTML = horarios;

    }
</script>


