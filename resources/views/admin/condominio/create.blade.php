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

  {!! Form::open(['route' => 'condominio.store', 'method' => 'POST','id'=>'form']) !!}

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
              <label>Nombre del Encargado: </label>
              {!! Form::text('nombre',null,['name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado del Condomine']) !!}
            </div>
            <div class="form-group">
              <label >Correo: </label>
              {!! Form::email('correo',null,['id'=>'correo','name'=>'correo','class'=>'form-control','placeholder'=>'ejemplo: empresa@ymail.com','pattern'=>'[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,3}']) !!}
            </div>
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Fijo: </label>
                {!! Form::text('telefonoFijo',null,['name'=>'telefonoFijo','class'=>'form-control','id'=>'telefonoFijo', 'placeholder'=>'(999) 9999-9999'])!!}
                </div>
              <!-- /.input group -->

            <!-- /.form group -->
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Movil: </label>
                {!! Form::text('telefonoMovil',null,['id'=>'telefonoMovil','class'=>'form-control','id'=>'telefonoMovil', 'placeholder'=>'(999) 9999-9999'])!!}
                </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label>Selecione Las Opciones para Generar Las Cuotas: </label>
              <br>
              {{ Form::select('opciones[]',['Administrativo'=>'Administrativo','Parqueo'=>'Parqueo'],null,
              ['class'=>'form-control','multiple'=>'true'])}}
              <h6>Mantenga Presionado la tecla: Crtl o Control, y asi seleccione las Opciones, dando clic en ellos</h6>
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
              {!! Form::text('NLocal',null,['name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}','title'=>'Solo letras mayuscula de la letra A hasta la letra F']) !!}
            </div>
            <div class="form-group">
              <label >Año De Iniciacion de Facturacion: </label>
              {!! Form::text('facturacion',null,['name'=>'facturacion','id'=>'facturacion','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']) !!}
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
        <a type="submit" class="btn btn-primary" href="{!! asset('admin/buscar') !!}">Cancelar</a>
        <br>

      </div>
    </center>
  </div>
</div>

  {!!Form::close()!!}
@endsection
