@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Anular Facturas Emitidas a Los Condomine.</li>
 </ol>
@endsection
@section('content')
{!! Form::model($factura,['route' => ['facturacion.update',$factura->id], 'method' => 'PUT','id'=>'form']) !!}
<div class="row">
  <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Datos del Condomine</h3>
        </div>

        <div class="box-body">
            <div class="form-group">
                <label>Codigo: </label>
                {!! Form::text('codigo',$condominio->codigo,['disabled','class'=>'form-control','placeholder'=>'Codigo']) !!}
              </div>
          <div class="form-group">
            <label>Nombre del Condomine: </label>
            {!! Form::text('nombre',$condominio->empresa->nombre,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado']) !!}
          </div>
          <!-- /.form group -->
          <div class="form-group">
              <label >N° de Local: </label>
              {!! Form::text('NLocal',$condominio->NLocal,['disabled','name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}']) !!}
            </div>
            <div class="form-group">
              <label >RAZON DE ANULACION: </label>
              {!! Form::textarea('descripcion',null,['name'=>'descripcion','id'=>'descripcion','class'=>'form-control','placeholder'=>'Ingrese la Razon de La anulacion....']) !!}
            </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Datos de la Factura a Anular.</h3>
      </div>

      <div class="box-body">
          <div class="form-group">
              <label>MES: </label>
              {!! Form::text('Mes',$factura->mes,['disabled','class'=>'form-control','placeholder'=>'Codigo']) !!}
            </div>
        <div class="form-group">
          <label>AÑO: </label>
          {!! Form::text('ano',$factura->ano,['disabled','name'=>'ano','id'=>'ano','class'=>'form-control','placeholder'=>'Nombre del Encargado']) !!}
        </div>
        <div class="form-group">
          <label >CONCEPTO: </label>
          {!! Form::text('concepto',$factura->concepto,['disabled','id'=>'concepto','name'=>'concepto','class'=>'form-control','placeholder'=>'ejemplo: empresa@ymail.com']) !!}
        </div>
        <!-- /.form group -->
        <div class="form-group">
            <label >TOTAL A PAGAR: </label>
            {!! Form::text('pago',$factura->cantidad,['disabled','name'=>'pago','id'=>'pago','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}']) !!}
          </div>

          <center>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Acciones</h3>
              </div>
              <div class="form-group" id="opciones">
                <label>Selecione lo que Desea Para la Factura: </label>
                <br>
                {{ Form::radio('emision','Imprimir',false)}}
                <label>Re-Imprimir </label> &nbsp;&nbsp;&nbsp;
                {{ Form::radio('emision','No Imprimir',false)}}
                <label>No Re-Imprimir</label>
              </div>
            <button type="submit" class="btn btn-danger">ANULAR</button>
            <a type="submit" class="btn btn-primary" href="{{route('facturacion.show',$factura->id.'-'.'3'.'-'.$condominio->id)}}">Cancelar</a>
            <br>
    
          </div>
        </center>
    </div>
  </div>
</div>
</div>

{{Form::close()}}
@endsection