@extends('layout')
@section('tips','ads')
@section('content')
    <h3>Consejos visibles para los usuarios</h3>
    <p class="lead">Estos consejos pueder ver los usuarios </p>
    <div class="row">
        <div class="col-md-9 col-12">

            <button class="btn btn-outline-dark  btn-lg shadow mb-3" onclick="addCita()" >Agregar tip</button>

            <!-- inicio del articulo -->
            @foreach($tips as $tip)
                <div class="card  border-secondary mb-4 ml-2 shadow">
                    <div class="card-header text-center">
                        <form method="post" action="{{route('tip.delete',$tip)}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button  type="submit" class="close btn btn-outline-dark"  aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                            {{$tip->title}}
                        </form>

                    </div>
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
            <button class="btn btn-outline-dark  btn-lg shadow mb-3" onclick="addAd()" >Agregar anuncio</button>
            @foreach($ads as $ad)
                <div class="card  border-info mb-3 shadow">
                    <div class="card-header text-center">
                        <form method="post" action="{{route('ad.delete',$ad)}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button  type="submit" class="close btn btn-outline-dark"  aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                            {{$ad->title}}
                        </form>
                    </div>
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

    <div class="container-fluid col-md-6 col-8 " id="createCita" >
        <form action="{{url('addTip')}}/" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Titulo</label>
                    <input type="text" class="form-control" id="" name="title">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Subtitulo</label>
                    <input type="text" class="form-control" id="" name="subtitle">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Contenido</label>
                <textarea class="form-control" id="textarea1" rows="2" name="content"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputdate">Fotografia</label>
                    <input type="file" class="btn btn-dark btn-block " name="image" id="inputdate" >
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
        <br>
        <br>
    </div>

    <div class="container-fluid col-md-6 col-8 " id="createAd" >
        <form action="{{url('addAd')}}/" method="post">
            {{ csrf_field() }}
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Titulo</label>
                    <input type="text" class="form-control" id="" name="title">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Subtitulo</label>
                    <input type="text" class="form-control" id="" name="subtitle">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Contenido</label>
                <textarea class="form-control" id="textarea1" rows="2" name="content"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputdate">Precio</label>
                    <input type="text" class="form-control " name="price" id="inputdate" >
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
        <br>
        <br>
    </div>

    <script type="text/javascript">
        function addCita() {
            $("#createCita").fadeToggle(2000);
        }
        function addAd() {
            $("#createAd").fadeToggle(2000);
        }
        function closeCita() {
            $("#createCita").fadeOut(2000);
            $("#createAd").fadeOut(2000);
        }

    </script>



@endsection
