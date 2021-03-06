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

  {!! Form::model($condomine,['route' => ['pago.update',$condomine->id], 'method' => 'PUT','id'=>'form']) !!}

  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <?php

        // dd($arrayMes1);
        $countmes = count($arrayMes1);
        $date = \Carbon\Carbon::now();
        $val = \SIGRECOFERO\estado::where('ano','=',$anoPago)->where('concepto','=',$concepto1)->where('id_Condominio',$condomine->id)->where('mes','=',$arrayMes1[0])->get()->first();
        $fecha = \SIGRECOFERO\fecha::find($val->id_Fecha);
          # code...
          // dd($fecha->id);
          for ($i=0; $i < $countmes ; $i++) {
            # code...
            $meses = \SIGRECOFERO\estado::where('mes','=',$arrayMes1[$i])->where('ano','=',$anoPago)->where('concepto','=',$concepto1)->where('id_Condominio',$condomine->id)->where('id_Fecha','=',$fecha->id)->get();
            $concepto = \SIGRECOFERO\estado::where('mes','=',$arrayMes1[$i])->where('ano','=',$anoPago)->where('concepto','=',$concepto1)->where('id_Condominio',$condomine->id)->where('id_Fecha','=',$fecha->id)->get()->first();
            
         ?>
         

         @foreach ($meses as $as)
           <div class="form-group">
             <label> {{$as->mes}} :</label>
            &nbsp&nbsp {!! Form::text('factura[]',null,['name'=>'factura[]','id'=>'factura','class'=>'form-control','placeholder'=>'Escriba el Numero de Factura del Mes Correspondiente','required','title'=>'Ingrese el numero de factura']) !!}
            <input type="hidden" name="mes[]" value="{{$as->mes}}">
           </div>
         @endforeach
         <?php   }    ?>
         
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
