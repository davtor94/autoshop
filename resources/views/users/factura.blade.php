@extends('layout')
@section('user','appointment','concepts')
@section('content')

    <div class="container" >
        <br>
        <br>
        <div class="row color-invoice id="imprimir"">
        <div class="col-md-12">
            No: 78660
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <h1>FACTURA</h1>
                    <br />
                    <strong>Email : </strong> David.Torres@alumnos.udg.mx
                    <br />
                    <strong>Telefono : </strong> +052 33 14 11 56 35
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">

                    <h2>  Dirección</h2> Beatriz Hernandez 1195 , Guadalajara , Jalisco,
                    <br> CP 45170,
                    <br> Mexico.

                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <h3>Nombre del cliente : </h3>
                    <h5>{{$user->name}} </h5>  {{$appointment->fecha}}
                    <br /> Mexico
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <h3>Contacto del cliente :</h3> telefono: +0523355689
                    <br> email: {{$user->email}}
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <strong>Conceptos y Detalles :</strong>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Descripción</th>
                                <th>Cantidad.</th>
                                <th>Precio unitario</th>
                                <th>Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($concepts as $concept)
                                <tr>
                                    <td>{{$loop->index}}</td>
                                    <td>{{$concept->description}}</td>
                                    <td>1</td>
                                    <td>${{$concept->price}}</td>
                                    <td>${{$concept->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div>
                        @php($sumatoria = 0)
                        @foreach($concepts as $concept)
                            @php($sumatoria += $concept->price)
                        @endforeach
                        <h4>  SubTotal : $ {{$sumatoria}} </h4>
                    </div>
                    <hr>
                    <div>
                        <h4>  Impuestos : $ {{$impuesto = $sumatoria*.16}} ( 16 %  ) </h4>
                    </div>
                    <hr>
                    <div>
                        <h3>  Total : $ {{$impuesto+$sumatoria}}  </h3>
                    </div>
                    <hr />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <strong> Importante: </strong>
                    <ol>
                        <li>
                            Esta factura no cuenta con efectos legales.
                        </li>
                        <li>
                            Se prohibe la difamacion de este negocio.
                        </li>
                        <li>
                            Pd. no hay tinta a color.
                        </li>
                    </ol>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button onclick="imprimir()" class="btn btn-success btn-sm">Imprimir Factura</button>    
                    <button onclick="PrintElem()" class="btn btn-info btn-sm">Descargar Pdf</button>
                </div>
            </div>

            <hr>
            <div class="row">


            </div>
        </div>
    </div>
    </div>
    <script>
        function imprimir() {
            window.print();
        }

        function PrintElem()
        {

            var content = document.getElementById("imprimir").innerHTML;
            var mywindow = window.open('', 'Print', 'height=600,width=800');
            mywindow.document.write('<html><head><title>Print</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write(content);
            mywindow.document.write('</body></html>');

            mywindow.document.close();
            mywindow.focus()
            mywindow.print();
            mywindow.close();
            return true;
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Varela+Round');

        /* General Styles */

        body {
            font-size: 16px;
            line-height: 25px;
            padding-top: 50px;
            font-family: 'Varela Round', sans-serif;
            background-color: #e7e7e7;
            padding-bottom:50px;
        }
        .color-invoice{
            background-color: #ffffff;
            border: 1px solid #d7d7d7;
            padding-top:100px;
            padding-bottom:100px;
        }
    </style>
@endsection