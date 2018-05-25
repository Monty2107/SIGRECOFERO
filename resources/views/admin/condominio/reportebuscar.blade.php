@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Estado de Cuenta por Condominios</li>
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
        <?php $r=1; ?>
        @foreach($condominiobusqueda as $cb)
          <tr>
              <td>{{$r++}}</td>
              <td>{{$cb->codigo}}</td>
              <td>{{$cb->empresa->nombre}}</td>
              <td>{{$cb->NLocal}}</td>
              <td width="380px">
                <?php if(Auth::User()->cargo == 'Administracion' || Auth::User()->cargo == 'Programador' ){?>
                <a class="btn btn-info btn-rounded" href="{{asset('admin/estadoCuenta/'.$cb->id.'-'.'3')}}" target="_blank">Ver Estado de Cuenta</a>
                <a class="btn btn-success btn-rounded" href="{{asset('admin/estadoCuenta/'.$cb->id.'-'.'4')}}" target="_blank">Descargar Estado de Cuenta</a>
                <?php } ?>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
  {{-- {!! $condominiobusqueda->render() !!} --}}

@endsection
