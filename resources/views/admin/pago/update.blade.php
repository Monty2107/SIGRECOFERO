@extends('index')
@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('index') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Numero de Recibos De Los Pagos Mensuales</li>
 </ol>
@endsection

@section('content')

  {!! Form::model($condomine,['route' => ['pago.update',$condomine->id], 'method' => 'PUT','id'=>'form']) !!}

  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <?php
        $date = \Carbon\Carbon::now();
        $l=0;
        $fecha = \SIGRECOFERO\fecha::where('dia','=',$date->format('d'))->where('mes','=',$date->format('m'))->where('ano','=',$date->format('Y'))->get()->first();
          # code...
          $countmes = count($arrayMes1);
          for ($i=0; $i < $countmes ; $i++) {
            # code...
            $meses = \SIGRECOFERO\estado::where('mes','=',$arrayMes1[$i])->where('concepto','=',$concepto1)->where('id_Condominio',$condomine->id)->where('estado','=',1)->get();
            $concepto = \SIGRECOFERO\estado::where('mes','=',$arrayMes1[$i])->where('concepto','=',$concepto1)->where('id_Condominio',$condomine->id)->where('estado','=',1)->get()->first();


         ?>
         @foreach ($meses as $as)
           <div class="form-group">
             <label> {{$as->mes}} :</label>
            &nbsp&nbsp {!! Form::text('factura[]',null,['name'=>'factura[]','id'=>'factura','class'=>'form-control','placeholder'=>'Escriba el Numero de Factura del Mes Correspondiente']) !!}
            <input type="hidden" name="mes[]" value="{{$as->mes}}">
           </div>
         @endforeach

         <?php   } ?>
      </div>
      <input type="hidden" name="pagina" value="2">
      <input type="hidden" name="radioConcepto" value="{{$concepto->concepto}}">
      <input type="hidden" name="ano" value="{{$concepto->ano}}">
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
