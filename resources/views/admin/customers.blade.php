@extends('layout')
@section('users')
@section('content')
    <div class="container-fluid">
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="display-4 text-center">    Listado de clientes </h1>
            </div>

        </div>
        <div class="row">
            <div class="col-md-2">
                <button onclick="addCita()" class="mr-auto btn btn-outline-secondary btn-block btn-lg shadow">
                    Agregar
                </button>
            </div>
            <div class="col-md-9">
                <table class="table table-list-search">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

