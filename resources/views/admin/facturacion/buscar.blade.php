@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Buscar Facturas Emitidas a Los Condomine.</li>
 </ol>
@endsection
@section('content')
<?php dd('hola') ?>
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Datos de Facturacion Listado de Condomine</h3>
        </div>
<div class="table-responsive" id="tablaAdmin">
    <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
        <thead>
            <tr>
                <th width="50px">N°</th>
                <th >CODIGO</th>
                <th >CONDOMINE</th>
                <th>N° DE LOCAL A FACTURAR</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody class="busqueda">
          <?php $r=1; ?>
          @foreach($condomine as $c)
            <tr>
                <td>{{$r++}}</td>
                <td>{{$c->codigo}}</td>
                <td>{{$c->empresa->nombre}}</td>
                <td align="center">{{$c->NLocal}}</td>
                <td width="250px">
                  <a class="btn btn-info btn-rounded" href="{{route('facturacion.show',$c->id.'-'.'0')}}">Ver Historial</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
</div>
</div>
@endsection