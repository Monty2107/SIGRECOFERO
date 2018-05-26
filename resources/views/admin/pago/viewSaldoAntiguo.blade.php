@extends('welcome')


@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Saldos de Antiguedad</li>
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
              <th>
                <input type="checkbox" name="dinamicos" id="dinamico" onClick="toggles(this)" />  SELECCIONAR TODOS
              </th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        @foreach($condominiobusqueda as $cb)
          <tr>
              <td>{{$r++}}</td>
              <td>{{$cb->codigo}}</td>
              <td>{{$cb->nombre}}</td>
              <td>{{$cb->NLocal}}</td>
              <td><input type="checkbox" name="dinamico" onClick="toggle(this)"> </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
  {{-- {!! $condominiobusqueda->render() !!} --}}

@endsection
