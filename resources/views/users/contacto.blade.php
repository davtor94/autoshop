@extends('layout')
@section('content')

    <div class="container-fluid col-md-8 col-sm-12" role="alert">
        <div class="row  justify-content-center mt-5 alert alert-dark">
            <div class="col-md-6 col-sm-12">
                <img src="img/logo.jpe" alt="" class="img-fluid">
            </div>
            <div class="col-md-8 col-sm-12 text-center ">
                <h1 class="display-4">AutoShop</h1>
                <p class="h5">Telefono:         16458562</p>
                <p class="h5">Telefono Celular: 3314115536</p>
                <p class="h5">Correo: AutoShop@gmail.com</p>
                <p class="h5">Direccion: Av.Patria #1194</p>
            </div>
            <div class="col-md-8 col-sm-12"id="map" style="height:400px;"></div>
        </div>
    </div>



    <script type="text/javascript">
        function initMap() {
            var uluru = {lat: 20.6570536, lng: -103.32495389999997};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwXzVEvAJMHf9FIi4GdaVvzmhUXZ9iVP4&callback=initMap"></script>

@endsection
