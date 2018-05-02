@extends('index')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Emision de Facturas.</li>
 </ol>
@endsection
@section('content')
<div class="row">
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Datos de Facturacion</h3>
    </div>
    <?php
      # code...
      $estadoAdmin = SIGRECOFERO\estado::where('concepto','=','Administrativo')->get()->first();
      $estadoParqueo = SIGRECOFERO\estado::where('concepto','=','Parqueo')->get()->first();
      $estadoOtros = SIGRECOFERO\estado::where('concepto','=','Otros')->get()->first();

     ?>
      <div class="box-body">
        <label>Selecione el Concepto Para Ver Su Historial: </label><br>
        @if(!is_null($estadoAdmin))
        {{ Form::radio('radioConcepto','Administrativo',false,['onchange'=>'mostrarTabla2(this.value);'])}}
        <label>Factura en Cuotas Administrativa </label> &nbsp;&nbsp;&nbsp;
        @endif
        <br>
        @if(!is_null($estadoParqueo))
        {{ Form::radio('radioConcepto','Parqueo',false,['onchange'=>'mostrarTabla2(this.value);'])}}
        <label>Factura en Cuotas de Parqueo </label>
        @endif
        <br>
        @if(!is_null($estadoOtros))
        {{ Form::radio('radioConcepto','Otros',false,['onchange'=>'mostrarTabla2(this.value);'])}}
        <label>Factura de Otras Cuotas </label>
        @endif
        </div>
  </div>
</div>

<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">ACCIONES</h3>
    </div>
      <div class="box-body">
        <div class="form-group">
          {!! Form::submit('Imprimir Todas las Facturas',['class'=>'form-control btn btn-success'])!!}
          <h6 style="color:blue">OJO: Antes de imprimir verifique la informacion ya que imprimira todas las 
            facturas no emitidas con los datos que contengan la base en estos momentos.
            (solo imprimira Administrativa y de Parqueo) </h6>
         </div>
         <div class="form-group" id="btnAdmin" style="display:none;">
            {!! Form::submit('Imprimir Todas las Facturas Administrativas',['class'=>'form-control btn btn-warning'])!!}
            <h6 style="color:blue">OJO: Antes de imprimir verifique la informacion ya que imprimira todas las 
              facturas no emitidas con los datos que contengan la base en estos momentos. </h6>
           </div>
           <div class="form-group" id="btnParqueo" style="display:none;">
              {!! Form::submit('Imprimir Todas las Facturas de Parqueo',['class'=>'form-control btn btn-warning'])!!}
              <h6 style="color:blue">OJO: Antes de imprimir verifique la informacion ya que imprimira todas las 
                facturas no emitidas con los datos que contengan la base en estos momentos. </h6>
             </div>
             <div class="form-group" id="btnOtros" style="display:none;">
                {!! Form::submit('Imprimir Todas las Facturas de Otros Pagos',['class'=>'form-control btn btn-warning'])!!}
                <h6 style="color:blue">OJO: Antes de imprimir verifique la informacion ya que imprimira todas las 
                  facturas no emitidas con los datos que contengan la base en estos momentos. </h6>
               </div>
        </div>
  </div>
</div>
</div>

<div class="table-responsive" id="tablaAdmin" style="display:none;">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CODIGO</th>
              <th >CONDOMINE</th>
              <th>CONCEPTO</th>
              <th>CANTIDAD  A PAGAR</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        @foreach($condomine as $c)
        <?php 
              $facturacion = SIGRECOFERO\facturacion::where('id_Condominio','=',$c->id)->where('emision','=','No Emitido')->where('concepto','=','Administrativo')->first();
              ?>
          <tr>
              @if(!is_null($facturacion))
              <td>{{$r++}}</td>
              <td>{{$c->codigo}}</td>
              <td>{{$c->empresa->nombre}}</td>
              <td>{{$facturacion->concepto}}</td>
              <td align="center">$ {{$facturacion->cantidad}}</td>
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="{{route('facturacion.show',$c->id)}}">Ver Facturacion</a>
                <a class="btn btn-info btn-rounded" href="{{route('condominio.edit',$c->id)}}">Modificar</a>
              </td>
              @endif
          </tr>
          @endforeach
      </tbody>
  </table>
</div>

<div class="table-responsive" id="tablaOtros" style="display:none;">
  <table id="examplee" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CODIGO</th>
              <th >CONDOMINE</th>
              <th>CONCEPTO</th>
              <th>CANTIDAD  A PAGAR</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        @foreach($condomine as $c)
        <?php 
              $facturacion = SIGRECOFERO\facturacion::where('id_Condominio','=',$c->id)->where('emision','=','No Emitido')->where('concepto','=','Otros')->first();
              ?>
          <tr>
              @if(!is_null($facturacion))
              <td>{{$r++}}</td>
              <td>{{$c->codigo}}</td>
              <td>{{$c->empresa->nombre}}</td>
              <td>{{$facturacion->concepto}}</td>
              <td align="center">$ {{$facturacion->cantidad}}</td>
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="{{route('facturacion.show',$c->id)}}">Ver Facturacion</a>
                <a class="btn btn-info btn-rounded" href="{{route('condominio.edit',$c->id)}}">Modificar</a>
              </td>
              @endif
          </tr>
          @endforeach
      </tbody>
  </table>
</div>

<div class="table-responsive" id="tablaParqueo" style="display:none;">
  <table id="examples" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CODIGO</th>
              <th >CONDOMINE</th>
              <th>CONCEPTO</th>
              <th>CANTIDAD  A PAGAR</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        @foreach($condomine as $c)
        <?php 
              $facturacion = SIGRECOFERO\facturacion::where('id_Condominio','=',$c->id)->where('emision','=','No Emitido')->where('concepto','=','Parqueo')->first();
              ?>
          <tr>
              @if(!is_null($facturacion))
              <td>{{$r++}}</td>
              <td>{{$c->codigo}}</td>
              <td>{{$c->empresa->nombre}}</td>
              <td>{{$facturacion->concepto}}</td>
              <td align="center">$ {{$facturacion->cantidad}}</td>
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="{{route('facturacion.show',$c->id)}}">Ver Facturacion</a>
                <a class="btn btn-info btn-rounded" href="{{route('condominio.edit',$c->id)}}">Modificar</a>
              </td>
              @endif
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection