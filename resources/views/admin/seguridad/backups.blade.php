@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Backups.</li>
 </ol>
@endsection
@section('content')
<h3>Administrador de Backups</h3>
    <div class="row">
        
        <div class="col-xs-12 clearfix">
            <a id="create-new-backup-button" href="{{ url('admin/backup/createBase') }}" class="btn btn-info pull-right"
               style="margin-bottom:2em;"><i
                    class="fa fa-plus"></i> Crear Nuevo Backups solo base
            </a>
        </div>
        <div class="col-xs-12">
            @if (count($backups))

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Archivo</th>
                        <th>Tamaño</th>
                        <th>Fecha</th>
                        <th>Año</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($backups as $backup)
                    <?php 
                    $fecha = explode('-',$backup['file_name']);
                    ?>
                        <tr>
                            <td>{{ $backup['file_name'] }}</td>
                            <td>{{ $backup['file_size'] }}</td>
                            <td>
                                {{ $fecha[2].' - '.$fecha[1].' - '.$fecha[0] }}
                            </td>
                            <td>
                                {{ $fecha[0] }}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-info"
                                   href="{{ url('backup/download/'.$backup['file_name']) }}"><i
                                        class="fa fa-cloud-download"></i>Descargar</a>
                                <a class="btn btn-xs btn-danger" data-button-type="delete"
                                   href="{{ url('backup/delete/'.$backup['file_name']) }}"><i class="fa fa-trash-o"></i>
                                    Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="well">
                    <h4>No hay copias de seguridad</h4>
                </div>
            @endif
        </div>
    </div>
@endsection