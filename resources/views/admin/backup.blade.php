
@extends('layout')
@section('backups')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <div class="text-center">
        <h3>Administrador de Backups</h3>
    </div><br>
    <div class="text-center">
        <div class="text-center">
            <a id="create-new-backup-button" href="{{ url('didBackup') }}" class="btn btn-primary"
               style="margin-bottom:2em;"><i
                        class="fa fa-plus"></i> Realizar Respaldo
            </a>
        </div>
        <div class="text-center">
            @if (count($backups))

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Fecha</th>
                        <th class="text-center"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($backups as $backup)
                        <tr>
                            <td>{{ $backup['file_name'] }}</td>
                            <td>{{ $backup['file_size']}}</td>
                            <td>
                                {{date("Y-m-d H:i:s",$backup['last_modified'])}}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-xs btn-primary"
                                   href="{{ url('/download/',compact($backup['file_name'])) }}"><i class="fa fa-cloud-download"></i> Descargar</a>
                                <a class="btn btn-xs btn-danger" data-button-type="delete"
                                   href="#"><i class="fa fa-trash-o"></i>
                                    Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="well">
                    <h4>There are no backups</h4>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@endsection