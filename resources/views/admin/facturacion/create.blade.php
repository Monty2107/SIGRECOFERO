@extends('index')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Emision de Facturas.</li>
 </ol>
@endsection
@section('content')
@foreach($condomine as $c)
<?php 
$conceptoAdmin = \SIGRECOFERO\estado::where('id_Condominio','=',$c->id)->where('concepto','=','Administrativo')->first(); 
$cantidadAdmin = \SIGRECOFERO\facturacion::where('id_Estado','=',$conceptoAdmin->id)->first();

?>
@endforeach

<div class="table-responsive">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CONDOMINE</th>
              <th>CONCEPTO</th>
              <th>CANTIDAD  A PAGAR</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        @foreach($condomine as $c)
          <tr>
              <td>{{$r++}}</td>
              <td>{{$c->empresa->nombre}}</td>
              <td>{{$conceptoAdmin->concepto}}</td>
              <td align="center">$ {{$cantidadAdmin->cantidad}}</td>
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="{{route('facturacion.show',$c->id)}}">Ver Facturacion</a>
                <a class="btn btn-info btn-rounded" href="{{route('condominio.edit',$c->id)}}">Emitir</a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection