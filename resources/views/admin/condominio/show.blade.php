@extends('index')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('index') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Ver Condominio</li>
 </ol>
@endsection
@section('content')
  {!! Form::model($condomine,['route' => ['condominio.destroy',$condomine->id], 'method' => 'DELETE','id'=>'eliminar']) !!}

  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro General</h3>
        </div>
        <!-- /.box-header -->
        <?php
        $emp = SIGRECOFERO\condominio::where('id_Empresa', $condomine->id)->get()->first();
        // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
         ?>

          <div class="box-body">
            <div class="form-group">
              <label>Nombre del Encargado: </label>
              {!! Form::text('nombre',$emp->empresa->nombre,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado']) !!}
            </div>
            <div class="form-group">
              <label >Correo: </label>
              {!! Form::email('correo',$emp->empresa->correo,['disabled','id'=>'correo','name'=>'correo','class'=>'form-control','placeholder'=>'ejemplo: empresa@ymail.com']) !!}
            </div>
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Fijo: </label>
                {!! Form::text('telefonoFijo',$emp->empresa->telefonoFijo,['disabled','name'=>'telefonoFijo','class'=>'form-control','id'=>'telefonoFijo', 'placeholder'=>'(999) 9999-9999', 'pattern'=>'^\([0-9]{3}\)\s[0-9]{4}-[0-9]{4}$'])!!}
                </div>
              <!-- /.input group -->

            <!-- /.form group -->
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Movil: </label>
                {!! Form::text('telefonoMovil',$emp->empresa->telefonoMovil,['disabled','name'=>'telefonoMovil','class'=>'form-control','id'=>'telefonoMovil', 'placeholder'=>'(999) 9999-9999', 'pattern'=>'^\([0-9]{3}\)\s[0-9]{4}-[0-9]{4}$'])!!}
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
              {!! Form::text('codigo',null,['disabled','class'=>'form-control','placeholder'=>'Codigo']) !!}
            </div>
            <div class="form-group">
              <label >N° de Local: </label>
              {!! Form::text('NLocal',null,['disabled','name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}']) !!}
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
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
            Eliminar
          </button>
        {{-- <button type="submit" class="btn btn-danger" id="eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</button> --}}
        <a type="submit" class="btn btn-primary" href="{{route('condominio.edit',$emp->id)}}">Modificar</a>
        <a type="submit" class="btn btn-primary" href="{!! asset('admin/buscar') !!}">Cancelar</a>
        <br>

      </div>
    </center>
  </div>
  </div>



  <section class="content">
    <div class="modal modal-danger fade" id="modal-danger">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Advertencia</h4>
          </div>
          <div class="modal-body">
            <p>Si llega a Aceptar, no podra recuperar dicha informacion.
              <br>
              Esta seguro de Eliminarlo?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-outline">Si, Acepto</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<!-- /.content -->
{!!Form::close()!!}
  @endsection
