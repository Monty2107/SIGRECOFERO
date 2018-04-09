@extends('index')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('index') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Busqueda de Condominios</li>
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
        @foreach($condominiobusqueda as $cb)
          <tr>
              <td>{{$cb->id}}</td>
              <td>{{$cb->codigo}}</td>
              <td>{{$cb->empresa->nombre}}</td>
              <td>{{$cb->NLocal}}</td>
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="{{route('condominio.show',$cb->id)}}">Ver</a>
                <a class="btn btn-info btn-rounded" href="{{route('condominio.edit',$cb->id)}}">Modificar</a>

              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
  {{-- {!! $condominiobusqueda->render() !!} --}}

@endsection
