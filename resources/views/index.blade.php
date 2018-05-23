@extends('welcome')

@section('content')
    <label class="label-warning">Ultima Actualizacion: 22/Mayo/2018</label><br>

  
  <div class="row">
      <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <center>
              <h3 class="box-title">Logo Del Sistema</h3>
              </center>
            </div>
            <br>
            <center>
            <img src="{!! asset('img/gano4.png') !!}" height="300px"><br><br>
          </center>
          </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header with-border">
            <center>
            <h3 class="box-title">BIENVENIDO: {{Auth::User()->name}}</h3>
            </center>
          </div>
          <br>
              <div class="box-body">
                  <div class="form-group">
                    <label>Cargo: </label>
                    {!! Form::text('nombre',Auth::User()->cargo,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado']) !!}
                  </div>
                    <div class="form-group">
                        <label>Correo Que Usa Para Iniciar Sesion: </label>
                        {!! Form::text('nombre',Auth::User()->email,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado']) !!}
                      </div>
                      <div class="col-md-3">
                      </div>
                      <div class="col-md-6">
                          <div class="box box-primary">
                            <div class="box-header with-border">
                              <center>
                              <h3 class="box-title">Acciones: </h3>
                              </center>
                            </div>
                          <div>
                            <center>
                            <a type="submit" class="btn btn-primary" href="{{asset('admin/Perfil')}}">Ver Mi Perfil</a>
                            </center>
                          </div>
                          </div>
                      </div>
                    <!-- /.input group -->
                  </div>

        </div>
  </div>
<div class="col-md-12" id="tablaAnulada">
    <div class="box box-primary">
      <div class="box-header with-border">
        <center>
        <h3 class="box-title">Listado de Facturas A Dar Permisos De Anulacion</h3>
        </center>
      </div>
<div class="table-responsive" >
  <table id="exampli" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th>CONDOMINE</th>
              <th>ESTADO DE FACTURACION</th>
              <th>CONCEPTO</th>
              <th>RAZON DE ANULACION</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $t4=1; 
        $facturacion3 = \SIGRECOFERO\facturacion::where('emision','=','Anulado He Imprimir')->get();       
        
        ?>
        @foreach($facturacion3 as $f)
        <?php $permiso = explode('-',$f->permiso); 
        $condominio = \SIGRECOFERO\empresa::find($f->id_Condominio);
        ?>
        @if($permiso[2] != Auth::User()->id || Auth::User()->cargo == 'Programador')
          <tr>
              <td>{{$t4++}}</td>
              <td>{{$condominio->nombre}}</td>
              <td>{{$f->emision}}</td>
              <td>{{$f->concepto}}</td>
              <?php $razon= \SIGRECOFERO\factura_anulada::find($permiso[1])?>
              <td>{{$razon->descripcion}}</td>
              <td>
                @if($permiso[0] == 1)
                <?php 
                $Per = \SIGRECOFERO\User::find($permiso[2]);
                ?>
                <span class="label label-success">{{$Per->cargo}} A DADO PERMISO</span>
                @if(Auth::User()->cargo == 'Programador' || Auth::User()->cargo == 'Administracion')
                <a class="btn btn-success btn-rounded" href="{{route('facturacion.show',$f->id.'-'.'2')}}">MODIFICAR</a>
                @endif
                @if(Auth::User()->cargo == 'Programador' || Auth::User()->cargo == 'Financiero')
                <a class="btn btn-info btn-rounded" href="{{asset('admin/facturacionIndividual').'/'.$f->id}}" onclick="javascript:window.location.reload();" target="_blank">EMITIR</a>
                @endif
                @endif

                @if($permiso[0] == 0)
                <?php 
                $Per = \SIGRECOFERO\User::find($permiso[2]);
                ?>
                <span class="label label-warning">{{$Per->cargo}}</span>
                <br>
                <span class="label label-warning">A SOLICITADO PERMISO</span>
                
                @if(Auth::User()->cargo != $permiso[2] || Auth::User()->cargo == 'Programador')
                <a class="btn btn-success btn-rounded" href="{{route('facturacion.edit',$f->id)}}">DAR PERMISO</a>
                @endif
                @endif

              </td>
              @endif
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
</div>

        
  </div>
  
@endsection