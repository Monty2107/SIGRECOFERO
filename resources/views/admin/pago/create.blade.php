@extends('index')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Agregar nuevo Pago.</li>
 </ol>
@endsection
@section('content')

{!! Form::model($condomine,['route' => ['nuevopago.update',$condomine->id], 'method' => 'PUT','id'=>'form']) !!}
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <!-- /.box-header -->
        <?php
        $emp = SIGRECOFERO\condominio::where('id_Empresa', $condomine->id)->get()->first();
        // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
         ?>

          <div class="box-body">
              <div class="form-group" >
                  <label >Descripcion: </label>
                  {!! Form::textarea('descripcion',null,['rows'=>'3','name'=>'descripcion','id'=>'descripcion','class'=>'form-control','placeholder'=>'Escriba la razon del Pago....']) !!}
                </div>
                <div class="form-group">
                    <label >Fecha De Iniciacion de Facturacion: </label>
                    {!! Form::date('anoI',null,['name'=>'anoI','id'=>'anoI','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']) !!}
                </div>
                <div class="form-group">
                    <label >Fecha De Finalizacion De Facturacion: </label>
                    {!! Form::date('anoF',null,['name'=>'anoF','id'=>'anoF','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']) !!}
                </div>
                <div class="form-group">
                        <label >Cantidad: </label>
                        {!! Form::number('cantidad',null,['name'=>'cantidad','id'=>'cantidad','class'=>'form-control','placeholder'=>'$$']) !!}
                      </div>

              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          <!-- /.box-body -->
      </div>
    </div>
    <!--/.col (right) -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Informacion General</h3>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
                <div class="form-group">
                        <label>Nombre del Condominio: </label>
                        {!! Form::text('nombre',$emp->empresa->nombre,['name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado del Condomine']) !!}
                      </div>
            <div class="form-group">
              <label>Codigo: </label>
              {!! Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo']) !!}
            </div>
            <div class="form-group">
              <label >N° de Local: </label>
              {!! Form::text('NLocal',null,['name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}','title'=>'Solo letras mayuscula de la letra A hasta la letra F']) !!}
            </div>
              <!-- /.input group -->
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.box-body -->
    <center>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Acciones</h3>
          </div>
        <button type="submit" class="btn btn-primary">Agregar Nuevo Pago</button>
        <a type="submit" class="btn btn-primary" href="{!! asset('admin/buscar') !!}">Cancelar</a>
        <br>

      </div>
    </center>
  </div>
  </div>
{!! Form::close() !!}

@endsection