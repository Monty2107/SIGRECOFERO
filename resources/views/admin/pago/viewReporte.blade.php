@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Bitacora.</li>
 </ol>
@endsection
@section('content')


<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title responsive">
        <h4>Reporte de Pago Diario</h4>
        <div class="input-group bootstrap-touchspin">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
            </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered display" cellspacing="100" width="100%" >
            <thead>
              <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Accion</th>
            
              </tr>
            </thead>
            <tbody>
                <?php $n =1; 
                $fechaVal = '0-0-0'
                ?>
<?php foreach($ingreso_diario as $ingreso): ?>
<?php   
$dato = explode(" ",(String)$ingreso->created_at);
$fecha = $dato[0];
$hora = $dato[1];
$datoFecha = explode("-",(String)$fecha);
$fechaOrdenada = $datoFecha[2]."-".$datoFecha[1]."-".$datoFecha[0];
$condominio = \SIGRECOFERO\condominio::find($ingreso->id_Condominio);

if($fechaOrdenada != $fechaVal){
?>
<tr>
    <td align="rihgt" style = "width:15%"><font size="4" ></font>{{$n++}}</td>
  <td align="rihgt" style = "width:15%"><font size="4" ></font>{{$fechaOrdenada}}</td>
  <td align="rihgt" style = "width:20%">
        <a type="button" href="{{asset('admin/reporteIngreso').'/'.$ingreso->id.'-'.'1'}}" class="btn btn-info responsive" target="_blank">Ver Reporte</a>
        <a type="button" href="{{asset('admin/reporteIngreso').'/'.$ingreso->id.'-'.'2'}}" class="btn btn-success responsive">Descargar Reporte</a>
  </td>
</tr>
<?php 
$fechaVal = $fechaOrdenada;
}
endforeach 
?>
                    </tbody>
            <tfoot>
            <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>Accion</th>
                    
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection