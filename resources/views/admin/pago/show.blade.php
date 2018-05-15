@extends('welcome')
@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Historial De Pagos Mensuales y Anuales</li>
 </ol>
@endsection

@section('content')
  {!! Form::model($condomine,['route' => ['condominio.update',$condomine->id], 'method' => 'PUT','id'=>'form']) !!}
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Informacion General</h3>
        </div>
        <?php
        $emp = SIGRECOFERO\condominio::where('id_Empresa', $condomine->id)->get()->first();
        // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
        $estado1 = SIGRECOFERO\estado::where('id_Condominio','=',$condomine->id)->where('estado',0)->get();
        $count2 = count($estado1);
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
          # code...
          $estadoAdmin = SIGRECOFERO\estado::where('concepto','=','Administrativo')->where('id_Condominio','=',$condomine->id)->orderBy('ano','desc')->get();
          $estadoParqueo = SIGRECOFERO\estado::where('concepto','=','Parqueo')->where('id_Condominio','=',$condomine->id)->orderBy('ano','desc')->get();
          $estadoOtros = SIGRECOFERO\estado::where('concepto','=','Otros')->where('id_Condominio','=',$condomine->id)->orderBy('ano','desc')->get();
        $conteo=1;
        $conteo1=1;
        $conteo2=1;
        // dd($estadoParqueo);
         ?>
          <div class="box-body">
            <div class="form-group">
              <label>Nombre del Condomine: </label>
              {!! Form::text('nombre',$emp->empresa->nombre,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado del Condomine']) !!}
            </div>
            <label>Selecione el Concepto Para Ver Su Historial: </label><br>
            @if(!$estadoAdmin->isEmpty())
            {{ Form::radio('radioConcepto','Administrativo',false,['onchange'=>'mostrarTabla(this.value);'])}}
            <label>Historial en Cuotas Administrativa </label> &nbsp;&nbsp;&nbsp;
            @endif

            @if(!$estadoParqueo->isEmpty())
            {{ Form::radio('radioConcepto','Parqueo',false,['onchange'=>'mostrarTabla(this.value);'])}}
            <label>Historial en Cuotas de Parqueo </label>
            @endif

            @if(!$estadoOtros->isEmpty())
            {{ Form::radio('radioConcepto','Otros',false,['onchange'=>'mostrarTabla(this.value);'])}}
            <label>Historial de Otras Cuotas </label>
            @endif
            </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Informacion General</h3>
        </div>
          <div class="box-body">
            <div class="form-group">
              <label>N° De Local:  </label>
              {!! Form::text('NLocal',$condomine->Nlocal,['disabled','name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'Nombre del Encargado del Condomine']) !!}
            </div>
            </div>
      </div>
    </div>

  </div>

  <div class="table-responsive" id="tablaOtros" style="display:none;">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CONCEPTO</th>
              <th >DESCRIPCION</th>
              <th>ESTADO</th>
              <th>MES</th>
              <th>AÑO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        @foreach($estadoOtros as $cb)
          <tr>
            <td>{{$conteo++}}</td>
            <td>{{$cb->concepto}}</td>
            <td>{{$cb->descripcion}}</td>
            @if ($cb->estado == 0)
              <td><span class="label label-warning">DEBE</span></td>
            @endif
            @if ($cb->estado == 1)
              <td><span class="label label-info">PAGADO</span></td>
            @endif
            <td>{{$cb->mes}}</td>
            <td>{{$cb->ano}}</td>
            @if ($cb->estado == 0)
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="{{route('pagoMes.edit',$cb->id)}}">IR A PAGAR</a>
              </td>
            @endif
            @if ($cb->estado == 1)
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="{{route('pago.edit',$condomine->id)}}">VER FACTURA</a>
              </td>
            @endif
          </tr>
          @endforeach
      </tbody>
  </table>
  </div>

  <div class="table-responsive" id="tablaAdmin" style="display:none;">
  <table id="examples" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CONCEPTO</th>
              <th>ESTADO</th>
              <th>MES</th>
              <th>AÑO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        @foreach($estadoAdmin as $cb)
          <tr>
            <td>{{$conteo1++}}</td>
            <td>{{$cb->concepto}}</td>
            @if ($cb->estado == 0)
              <td><span class="label label-warning">DEBE</span></td>
            @endif
            @if ($cb->estado == 1)
              <td><span class="label label-info">PAGADO</span></td>
            @endif
            <td>{{$cb->mes}}</td>
            <td>{{$cb->ano}}</td>
            @if ($cb->estado == 0)
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="{{route('pagoMes.edit',$cb->id)}}">IR A PAGAR</a>
              </td>
            @endif
            @if ($cb->estado == 1)
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="{{route('pago.edit',$condomine->id)}}">VER FACTURA</a>
              </td>
            @endif
          </tr>
          @endforeach
      </tbody>
  </table>
</div>

<div class="table-responsive" id="tablaParqueo" style="display:none;">
<table id="examplee" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
    <thead>
        <tr>
            <th width="50px">N°</th>
            <th >CONCEPTO</th>
            <th>ESTADO</th>
            <th>MES</th>
            <th>AÑO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="busqueda">
      @foreach($estadoParqueo as $cb)
        <tr>
          <td>{{$conteo2++}}</td>
          <td>{{$cb->concepto}}</td>
          @if ($cb->estado == 0)
            <td><span class="label label-warning">DEBE</span></td>
          @endif
          @if ($cb->estado == 1)
            <td><span class="label label-info">PAGADO</span></td>
          @endif
          <td>{{$cb->mes}}</td>
          <td>{{$cb->ano}}</td>
          @if ($cb->estado == 0)
            <td width="250px">
              <a class="btn btn-success btn-rounded" href="{{route('pagoMes.edit',$cb->id)}}">IR A PAGAR</a>
            </td>
          @endif
          @if ($cb->estado == 1)
            <td width="250px">
              <a class="btn btn-info btn-rounded" href="{{route('pago.edit',$condomine->id)}}">VER FACTURA</a>
            </td>
          @endif
        </tr>
        @endforeach
    </tbody>
</table>
</div>

{{Form::close()}}
@endsection
