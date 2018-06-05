@extends('layout')
@section('tips','ads')
@section('content')
    <h3>Consejos</h3>
    <p class="lead">Algunos consejos para mantener en buen funcionamiento tu vehiculo son </p>
    <div class="row">
        <div class="col-md-9 col-12">
            <!-- inicio del articulo -->
            @foreach($tips as $tip)
                <div class="card  border-secondary mb-4 ml-2 shadow">
                    <div class="card-header text-center">{{$tip->title}}</div>
                    <div class="row">
                        <div class="col-3">
                            <img src="{{$tip->image}}" alt="" class="img-fluid shadow" style="border-radius: 15%;">
                            <br>
                        </div>
                        <div class="card-body col-9">
                            <h5 class="card-title">{{$tip->subtitle}}</h5>
                            <p class="card-text">{{$tip->content}}</p>
                            <a href="#" class="btn btn-outline-light btn-sm">Leer mas...</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- fin del articulo -->
        </div>

        <div class="col-md-3 col-12">
            @foreach($ads as $ad)
                <div class="card  border-info mb-3 shadow">
                    <div class="card-header text-center">{{$ad->title}}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$ad->subtitle}}</h5>
                        <p class="card-text">{{$ad->content}}</p>
                        <p class="card-text text-center">{{$ad->price}}</p>
                        <p class="text-center mb-0"><a href="#" class="btn btn-outline-light btn-sm ">Ver mas...</a></p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
