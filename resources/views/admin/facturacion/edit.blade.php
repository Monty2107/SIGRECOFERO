@extends('index')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Editar Condominio</li>
 </ol>
@endsection
@section('content')
  {!! Form::model($condomine,['route' => ['condominio.update',$condomine->id], 'method' => 'PUT','id'=>'form']) !!}

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
        $emp = SIGRECOFERO\condominio::where('id_Empresa','=', $condomine->id)->get()->first();
        $estado = \SIGRECOFERO\estado::where('concepto','=','Administrativo')->where('id_Condominio','=',$emp->id)->get()->first();
        // dd($estado);
        
        // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
         ?>
         <input type="hidden" name="factura" id="factura" value="2">
          <div class="box-body">
            <div class="form-group">
              <label>Nombre del Encargado: </label>
              {!! Form::text('nombre',$emp->empresa->nombre,['name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado del Condomine']) !!}
            </div>
            <div class="form-group">
              <label >Correo: </label>
              {!! Form::email('correo',$emp->empresa->correo,['id'=>'correo','name'=>'correo','class'=>'form-control','placeholder'=>'ejemplo: empresa@ymail.com','pattern'=>'[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,3}']) !!}
            </div>
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Fijo: </label>
                {!! Form::text('telefonoFijo',$emp->empresa->telefonoFijo,['name'=>'telefonoFijo','class'=>'form-control','id'=>'telefonoFijo', 'placeholder'=>'(999) 9999-9999'])!!}
                </div>
              <!-- /.input group -->

            <!-- /.form group -->
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Movil: </label>
                {!! Form::text('telefonoMovil',$emp->empresa->telefonoMovil,['name'=>'telefonoMovil','class'=>'form-control','id'=>'telefonoMovil', 'placeholder'=>'(999) 9999-9999'])!!}
                </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          <!-- /.box-body -->
      </div>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modiciaciones Opcionales</h3>
            </div>
            <div class="form-group">
          <label >Cantidad a Pagar en Factura Administracion: </label>
          {!! Form::number('cantidadAdmin',null,['name'=>'cantidadAdmin','id'=>'cantidadAdmin','class'=>'form-control','placeholder'=>'$$$','pattern'=>'[0-9]']) !!}
          <h6>Este Cambio Se Vera Afectado En El Siguiente Recibo Que Emita</h6>
        </div>
        <div class="form-group">
            <label >Cantidad a Pagar en Factura Parque: </label>
            {!! Form::number('cantidadParqueo',null,['name'=>'cantidadParqueo','id'=>'cantidadParqueo','class'=>'form-control','placeholder'=>'$$$','pattern'=>'[0-9]']) !!}
            <h6>Este Cambio Se Vera Afectado En El Siguiente Recibo Que Emita</h6>
          </div>
          
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
        <button type="submit" class="btn btn-primary">Modificar</button>
        <a type="submit" class="btn btn-primary" href="{!! asset('admin/buscar') !!}">Cancelar</a>
        <br>

      </div>
    </center>
  </div>
  </div>

  {!!Form::close()!!}
  @endsection
