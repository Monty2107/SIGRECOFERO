@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Saldos de Antiguedad</li>
 </ol>
@endsection
@section('content')
@if(count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
{!! Form::open(['route' => 'saldo_Antiguo.store', 'method' => 'POST','id'=>'form']) !!}
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Generacion de Saldos Antiguos</h3>
      </div>
      <!-- /.box-header -->

        <div class="box-body">
            <div class="col-md-6">
              <div class="form-group">
                  <label >Fecha Inicio : </label>
                  {!! Form::date('fechaInicial',null,['name'=>'fechaInicial','id'=>'fechaInicial','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']) !!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label >Fecha Final: </label>
                  {!! Form::date('fechaFinal',null,['name'=>'fechaFinal','id'=>'fechaFinal','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']) !!}
              </div>

              <div class="col-md-6">

            </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-rounded">Generar Reporte</button>
                      </div>
              <!-- /.input group -->
            </div>

            </div>
            
  
          <!-- /.form group -->
        <!-- /.box-body -->
    </div>
  </div>
  </div>

  

  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Condominios</h3>
      </div>
      <div class="box-body">
  <div class="table-responsive">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th>ENCARGADO</th>
              <th>CONDOMINE</th>
              <th>N° LOCAL</th>
              <th>
                 SELECCIONE EL/LOS CONDOMINIO
              </th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        @foreach($condominiobusqueda as $cb)
          <tr>
              <td>{{$r++}}</td>
              <td>{{$cb->nombre}}</td>
              <td>{{$cb->empresa->nombre}}</td>
              <td>{{$cb->NLocal}}</td>
          <td><input type="checkbox" name="seleccionar[]" value="{{$cb->id}}" onClick="toggle(this)">{{' '.$cb->codigo}}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
  {{-- {!! $condominiobusqueda->render() !!} --}}
</div>
<!-- /.form group -->
<!-- /.box-body -->
</div>
</div>
</div>
{!! Form::close() !!}
@endsection
