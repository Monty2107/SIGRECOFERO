@extends('index')
@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('index') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Pagos Mensuales</li>
 </ol>
@endsection

@section('content')

{!! Form::model($condomine,['route' => ['condominio.update',$condomine->id], 'method' => 'PUT','id'=>'form']) !!}

<div class="row">
  <!-- left column -->
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Registro Administrativo</h3>
      </div>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group" id="opciones">
            <label>Selecione el Concepto: </label>
            <br>
            {{ Form::radio('radioConcepto','Administracion',false,['onchange'=>'mostrar(this.value);'])}}
            <label>Cuota de Adminitracion </label> &nbsp;&nbsp;&nbsp;
            {{ Form::radio('radioConcepto','Parqueo',false,['onchange'=>'mostrar(this.value);'])}}
            <label>Cuota de Parqueo </label>&nbsp;&nbsp;&nbsp;
            {{ Form::radio('radioConcepto','Otro',false,['onchange'=>'mostrar(this.value);'])}}
            <label>Otro </label>
          </div>
          <div class="form-group" id="descripcion" style="display:none;">
            <label >Descripcion: </label>
            {!! Form::textarea('descripcion',null,['rows'=>'3','name'=>'descripcion','id'=>'descripcion','class'=>'form-control','placeholder'=>'Escriba la razon del Pago....']) !!}
          </div>
          <div class="form-group" id="opciones">
            <label>Selecione la Forma de Pago: </label>
            <br>
            {{ Form::radio('radioPago','Efectivo',false,['onchange'=>'mostrarC(this.value);'])}}
            <label>Efectivo </label> &nbsp;&nbsp;&nbsp;
            {{ Form::radio('radioPago','Cheque',false,['onchange'=>'mostrarC(this.value);'])}}
            <label>Cheque</label>
          </div>
          <div class="form-group" id="NCheque" style="display:none;">
            <label >Ingrese el N° de Cheque: </label>
            {!! Form::text('NCheque',null,['name'=>'NCheque','id'=>'NCheque','class'=>'form-control','placeholder'=>'### ###','pattern'=>'[0-9]','title'=>'Ingrese solo numeros']) !!}
          </div>
          <div class="form-group" id="Cantidad" style="display:none;">
            <label >Cantidad: </label>
            {!! Form::text('cantidad',null,['name'=>'cantidad','id'=>'cantidad','class'=>'form-control','placeholder'=>'$$','pattern'=>'[0-9]','title'=>'Ingrese solo numeros']) !!}
          </div>
          <div class="form-group">
            <label >Año a Pagar: </label>
            {!! Form::text('anoPago',null,['name'=>'anoPago','id'=>'anoPago','class'=>'form-control','placeholder'=>'20xx','pattern'=>'[0-9]{4}','title'=>'Ingrese solo numeros']) !!}
          </div>
          <div class="form-group">
            <label>Selecione el Mes o Meses a Pagar: </label>
            <br>
            <?php $date = \Carbon\Carbon::now() ?>
            {{ Form::select('Mes',['Enero'=>'Enero','Febrero'=>'Febrero','Marzo'=>'Marzo','Abril'=>'Abril',
            'Mayo'=>'Mayo','Junio'=>'Junio','Julio'=>'Julio','Agosto'=>'Agosto','Septiembre'=>'Septiembre',
            'Octubre'=>'Octubre','Noviembre'=>'Noviembre','Diciembre'=>'Diciembre'],null,
            ['class'=>'form-control','multiple'=>'true'])}}
            <h6>Mantenga Presionado la tecla: Crtl o Control, y asi seleccione los meses, dando clic en ellos</h6>
          </div>
            <!-- /.input group -->
            <!-- /.input group -->
          </div>
        </div>
          </div>
        <!-- /.box-body -->
        <!--/.col (right) -->
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Informacion General</h3>
      </div>
      <!-- /.box-header -->
      <?php
      $emp = SIGRECOFERO\condominio::where('id_Empresa', $condomine->id)->get()->first();
      // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
       ?>

        <div class="box-body">
          <div class="form-group">
            <label>Codigo: </label>
            {!! Form::text('codigo',null,['disabled','class'=>'form-control','placeholder'=>'Codigo']) !!}
          </div>
          <div class="form-group">
            <label>Nombre del Condomine: </label>
            {!! Form::text('nombre',$emp->empresa->nombre,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado']) !!}
          </div>
          <div class="form-group">
            <label >N° de Local: </label>
            {!! Form::text('NLocal',null,['disabled','name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}']) !!}
          </div>
          <div class="form-group">
            <label >Fecha Actual: </label>
            <?php $date = \Carbon\Carbon::now() ?>
            {!! Form::date('fechaPago',$date,['disabled','name'=>'fechaPago','id'=>'fechaPago','class'=>'form-control']) !!}
          </div>
          <!-- /.form group -->
          </div>
          <!-- /.form group -->
        <!-- /.box-body -->
    </div>
  <center>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Acciones</h3>
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-danger">
          Hacer Pago
        </button>
      {{-- <button type="submit" class="btn btn-danger" id="eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</button> --}}
      <a type="submit" class="btn btn-primary" href="{!! asset('admin/buscarCondomine') !!}">Cancelar</a>
      <br>

    </div>
  </center>
</div>
</div>

{!! Form::close()!!}
@endsection
