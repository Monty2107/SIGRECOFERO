@extends('welcome')
@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Numero de Recibos De Los Pagos Mensuales</li>
 </ol>
@endsection

@section('content')
@if(count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
  {!! Form::model($estado,['route' => ['pago.update',$estado->id], 'method' => 'PUT','id'=>'form']) !!}

  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <?php
          # code...
          $estadoC = \SIGRECOFERO\estado::find($estado->id);
          $facturacion = \SIGRECOFERO\facturacion::where('id_Estado',$estadoC->id)->get()->first();

         ?>
           <div class="form-group">
             <label> {{$estadoC->mes}} :</label>
            &nbsp&nbsp {!! Form::text('factura',null,['name'=>'factura','id'=>'factura','class'=>'form-control','placeholder'=>'Escriba el Numero de Factura del Mes Correspondiente']) !!}
            <input type="hidden" name="mes" value="{{$estadoC->mes}}">
           </div>
           <div class="form-group" id="opciones">
             <label>Selecione la Forma de Pago: </label>
             <br>
             {{ Form::radio('radioPago','Efectivo',false,['onchange'=>'mostrarC(this.value);'])}}
             <label>Efectivo </label> &nbsp;&nbsp;&nbsp;
             {{ Form::radio('radioPago','Cheque',false,['onchange'=>'mostrarC(this.value);'])}}
             <label>Cheque</label>
           </div>
           <div class="form-group" id="NBanco" style="display:none;">
            <label >Ingrese el Nombre Del Banco: </label>
            {!! Form::text('NBanco',null,['name'=>'NBanco','id'=>'NBanco','class'=>'form-control','placeholder'=>'Nombre Del Banco...']) !!}
          </div>
           <div class="form-group" id="NCheque" style="display:none;">
             <label >Ingrese el N° de Cheque: </label>
             {!! Form::text('NCheque',null,['name'=>'NCheque','id'=>'NCheque','class'=>'form-control','placeholder'=>'### ###']) !!}
           </div>
           <div class="form-group" id="Cantidad" style="display:none;">
             <label >Cantidad: </label>
             {!! Form::text('cantidad',null,['name'=>'cantidad','id'=>'cantidad','class'=>'form-control','placeholder'=>'$$']) !!}
           </div>
           @if ($estadoC->concepto == 'Otros')
             <div class="form-group" >
               <label >Descripcion: </label>
               {!! Form::textarea('descripcion',$estadoC->descripcion.' Con Pago de : $ '.$facturacion->cantidad,['rows'=>'3','name'=>'descripcion','id'=>'descripcion','class'=>'form-control','disabled']) !!}
               <input type="hidden" name="descripcion" value="{{$estadoC->descripcion.' Con Pago de : $ '.$facturacion->cantidad}}">
             </div>
           @endif
      </div>
      <input type="hidden" name="radioConcepto" value="{{$estadoC->concepto}}">
      <input type="hidden" name="ano" value="{{$estadoC->ano}}">
      <input type="hidden" name="id_Condominio" value="{{$estadoC->id_Condominio}}">
      <input type="hidden" name="Mes[]" value="{{$estadoC->mes}}">
    </div>
          <!-- /.box-body -->
          <!--/.col (right) -->
    <div class="col-md-6">
      <!-- general form elements -->
    <center>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Acciones</h3>
          </div>
          <button type="submit" class="btn btn-success">
            HACER PAGO
          </button>
        {{-- <button type="submit" class="btn btn-danger" id="eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</button> --}}
      </div>
    </center>
  </div>
  </div>

  {!!Form::close()!!}

@endsection
