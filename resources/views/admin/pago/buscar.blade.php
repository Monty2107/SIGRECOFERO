@extends('welcome')
@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Busqueda de Condomine</li>
 </ol>
@endsection

@section('content')
  <div class="table-responsive">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CODIGO</th>
              <th>CONDOMINE</th>
              <th>N° LOCAL</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
          <?php $s=1; ?>
        @foreach($condominiobusqueda as $cb)
          <tr>
              <td>{{$s++}}</td>
              <td>{{$cb->codigo}}</td>
              <td>{{$cb->empresa->nombre}}</td>
              <td>{{$cb->NLocal}}</td>
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="{{route('pago.show',$cb->id)}}">Historial</a>
                <a class="btn btn-success btn-rounded" href="{{route('pago.edit',$cb->id)}}">Pago</a>
                <a class="btn btn-warning btn-rounded" href="{{route('nuevopago.edit',$cb->id)}}">Nuevo Pago</a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection
