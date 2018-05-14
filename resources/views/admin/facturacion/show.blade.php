@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Ver Facturas Emitidas.</li>
 </ol>
@endsection
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Datos del Condomine</h3>
          </div>
          <?php
        $emp = SIGRECOFERO\condominio::where('id_Empresa', $condominio->id)->get()->first();
        // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
         ?>

          <div class="box-body">
              <div class="form-group">
                  <label>Codigo: </label>
                  {!! Form::text('codigo',$condominio->codigo,['disabled','class'=>'form-control','placeholder'=>'Codigo']) !!}
                </div>
            <div class="form-group">
              <label>Nombre del Condomine: </label>
              {!! Form::text('nombre',$emp->empresa->nombre,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado']) !!}
            </div>
            <div class="form-group">
              <label >Correo Del Condomine: </label>
              {!! Form::email('correo',$emp->empresa->correo,['disabled','id'=>'correo','name'=>'correo','class'=>'form-control','placeholder'=>'ejemplo: empresa@ymail.com']) !!}
            </div>
            <!-- /.form group -->
            <div class="form-group">
                <label >N° de Local: </label>
                {!! Form::text('NLocal',$condominio->NLocal,['disabled','name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}']) !!}
              </div>
        </div>
      </div>
    </div>
      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informacion a Mostrar</h3>
            </div>
                  <?php
                    # code...
                    $estadoAdmin = SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Administrativo')->get()->first();
                    $estadoParqueo = SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Parqueo')->get()->first();
                    $estadoOtros = SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Otros')->get()->first();
                   ?>
              
                    <div class="box-body">
                      <label>Selecione el Concepto Para Ver Su Historial: </label><br>
                      @if(!is_null($estadoAdmin))
                      {{ Form::radio('radioConcepto','Administrativo',false,['onchange'=>'mostrarTabla(this.value);'])}}
                      <label>Factura en Concepto Administrativa </label> &nbsp;&nbsp;&nbsp;
                      @endif
                      <br>
                      @if(!is_null($estadoParqueo))
                      {{ Form::radio('radioConcepto','Parqueo',false,['onchange'=>'mostrarTabla(this.value);'])}}
                      <label>Factura en Concepto de Parqueo </label>
                      @endif
                      <br>
                      @if(!is_null($estadoOtros))
                      {{ Form::radio('radioConcepto','Otros',false,['onchange'=>'mostrarTabla(this.value);'])}}
                      <label>Factura de Otros Concepto </label>
                      @endif
                      </div>
          </div>
        </div>
  <div class="col-md-12" id="tablaAdmin" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Facturacion</h3>
      </div>
<div class="table-responsive" >
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >MES</th>
              <th >AÑO</th>
              <th>ESTADO DE FACTURACION</th>
              <th>CONCEPTO</th>
              <th>ESTADO DE PAGO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $t1=1; 
        $facturacion = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Administrativo')->where('id_Condominio','=',$condominio->id)->get();
        ?>
        @foreach($facturacion as $c)
          <tr>
              <td>{{$t1++}}</td>
              <td>{{$c->mes}}</td>
              <td>{{$c->ano}}</td>
              <td align="center">{{$c->emision}}</td>
              <td>{{$c->concepto}}</td>
              @if ($c->estado == 0)
              <td><span class="label label-warning">DEBE</span></td>
            @endif
            @if ($c->estado == 1)
              <td><span class="label label-info">PAGADO</span></td>
            @endif
              <td width="250px">
                  @if ($c->emision == 'Emitido')
                  <a class="btn btn-danger btn-rounded" href="{{route('facturacion.show',$c->id.'-'.'1')}}">ANULAR FACTURA</a>
                @endif
                @if ($c->emision == 'No Emitido')
                <a class="btn btn-info btn-rounded" href="{{asset('admin/facturacionIndividual').'/'.$c->id}}" target="_blank">EMITIR</a>
                <a class="btn btn-success btn-rounded" href="{{route('facturacion.show',$c->id.'-'.'2')}}">MODIFICAR</a>
                @endif
                
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
</div>

<div class="col-md-12" id="tablaParqueo" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Facturacion</h3>
      </div>
<div class="table-responsive" >
  <table id="examples" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >MES</th>
              <th >AÑO</th>
              <th>ESTADO DE FACTURACION</th>
              <th>CONCEPTO</th>
              <th>ESTADO DE PAGO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $t2=1; 
        $facturacion1 = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Parqueo')->where('id_Condominio','=',$condominio->id)->get();
        ?>
        @foreach($facturacion1 as $c)
          <tr>
              <td>{{$t2++}}</td>
              <td>{{$c->mes}}</td>
              <td>{{$c->ano}}</td>
              <td align="center">{{$c->emision}}</td>
              <td>{{$c->concepto}}</td>
              @if ($c->estado == 0)
              <td><span class="label label-warning">DEBE</span></td>
            @endif
            @if ($c->estado == 1)
              <td><span class="label label-info">PAGADO</span></td>
            @endif
            <td width="250px">
                @if ($c->emision == 'Emitido')
                <a class="btn btn-danger btn-rounded" href="{{route('facturacion.show',$c->id.'-'.'1')}}">ANULAR FACTURA</a>
              @endif
              @if ($c->emision == 'No Emitido')
              <a class="btn btn-info btn-rounded" href="{{asset('admin/facturacionIndividual').'/'.$c->id}}" target="_blank">EMITIR</a>
              <a class="btn btn-success btn-rounded" href="{{route('facturacion.show',$c->id.'-'.'2')}}">MODIFICAR</a>
              @endif
              
            </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
</div>

<div class="col-md-12" id="tablaOtros" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Facturacion</h3>
      </div>
<div class="table-responsive" >
  <table id="examplee" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >MES</th>
              <th >AÑO</th>
              <th>ESTADO DE FACTURACION</th>
              <th>CONCEPTO</th>
              <th>ESTADO DE PAGO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $t3=1; 
        $facturacion2 = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Otros')->where('id_Condominio','=',$condominio->id)->get();       
        ?>
        @foreach($facturacion2 as $c)
          <tr>
              <td>{{$t3++}}</td>
              <td>{{$c->mes}}</td>
              <td>{{$c->ano}}</td>
              <td align="center">{{$c->emision}}</td>
              <?php 
              $estado = \SIGRECOFERO\estado::find($c->id);
              ?>
              <td>{{$estado->descripcion}}</td>
              @if ($c->estado == 0)
              <td><span class="label label-warning">DEBE</span></td>
            @endif
            @if ($c->estado == 1)
              <td><span class="label label-info">PAGADO</span></td>
            @endif
            <td width="250px">
                @if ($c->emision == 'Emitido')
                <a class="btn btn-danger btn-rounded" href="{{route('facturacion.show',$c->id.'-'.'1')}}">ANULAR FACTURA</a>
              @endif
              @if ($c->emision == 'No Emitido')
              <a class="btn btn-info btn-rounded" href="{{asset('admin/facturacionIndividual').'/'.$c->id}}" target="_blank">EMITIR</a>
              <a class="btn btn-success btn-rounded" href="{{route('facturacion.show',$c->id.'-'.'2')}}">MODIFICAR</a>
              @endif
              
            </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
</div>
</div>
@endsection