@extends('index')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('index') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Registro de Condominios</li>
 </ol>
@endsection
@section('content')

  {!! Form::open(['route' => 'condominio.store', 'method' => 'POST']) !!}

  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro General</h3>
        </div>
        <!-- /.box-header -->

          <div class="box-body">
            <div class="form-group">
              <label>Nombre de la Empresa: </label>
              {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Completo de la Empresa']) !!}
            </div>
            <div class="form-group">
              <label >Correo: </label>
              {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Correo de la Empresa']) !!}
            </div>
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Fijo: </label>
                {!! Form::text('phonefijo',null,['class'=>'form-control','id'=>'phonefijo', 'placeholder'=>'(999) 9999-9999', 'pattern'=>'^\([0-9]{3}\)\s[0-9]{4}-[0-9]{4}$'])!!}
                </div>
              <!-- /.input group -->

            <!-- /.form group -->
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Movil: </label>
                {!! Form::text('phoneMovil',null,['class'=>'form-control','id'=>'phonemovil', 'placeholder'=>'(999) 9999-9999', 'pattern'=>'^\([0-9]{3}\)\s[0-9]{4}-[0-9]{4}$'])!!}
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
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Codigo: </label>
              {!! Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo']) !!}
            </div>
            <div class="form-group">
              <label >N° de Local: </label>
              {!! Form::text('Nlocal',null,['class'=>'form-control','placeholder'=>'N° de Local']) !!}
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
        <button type="submit" class="btn btn-primary">Aceptar</button>
        <br>

      </div>
    </center>
  </div>
</div>

  {!!Form::close()!!}
@endsection
