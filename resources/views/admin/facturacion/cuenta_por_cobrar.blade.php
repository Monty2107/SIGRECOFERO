@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Cuentas Por Cobrar.</li>
 </ol>
@endsection
@section('content')


<div class="col-md-12" id="tablaAnulada">
        <div class="box box-primary">
          <div class="box-header with-border">
            <center>
            <h3 class="box-title">REPORTES DE CUENTAS POR COBRAR</h3>
            </center>
          </div>
    <div class="table-responsive" >
      <table id="exampli" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
              <tr>
                  <th width="50px">N°</th>
                  <th>MES</th>
                  <th>AÑO</th>
                  <th>CONCEPTO</th>
                  <th>FECHA DE CREACION</th>
                  <th>ACCIONES</th>
              </tr>
          </thead>
          <tbody class="busqueda">
                <?php $t4=1; 
            
                ?>
            @foreach($cuenta as $c)
            <?php $fecha = \SIGRECOFERO\fecha::find($c->id_Fecha);  ?>
              <tr>
                  <?php if($c->concepto == 'Todas'){?>
                  <td>{{$t4++}}</td>
                  <td>{{$c->mes}}</td>
                  <td>{{$c->ano}}</td>
                  <td>{{$c->concepto}}</td>
                  <td>{{$fecha->dia.' / '.$fecha->mes.' / '.$fecha->ano}}</td>
                  <td>
                        <a class="btn btn-info btn-rounded" href="{{asset('admin/VerCuenta').'/'.$c->id}}" target="_blank">VER</a>
                        <a class="btn btn-info btn-rounded" href="{{asset('admin/DescargarCuenta').'/'.$c->id}}" target="_blank">DESCARGAR</a>
                  </td>
                  <?php }?>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    </div>
    </div>

@endsection