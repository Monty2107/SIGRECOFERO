@extends('welcome')

@section('posicion')
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
 <li class="active">Nuevo Usuario</li>
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
{!! Form::open(['route' => 'usuario.store', 'method' => 'POST','id'=>'form']) !!}



  <div class="row">
    <!-- left column -->
    
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Crear Usuario</h3>
        </div>
          <div class="box-body">
            <div class="form-group">
              <label>Su Nombre: </label>
              {!! Form::text('nombre',null,['name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Ingrese Su Nombre.....']) !!}
            </div>
            
            <div class="form-group">
              <label >Correo: </label>
              {!! Form::email('correo',null,['id'=>'correo','name'=>'correo','class'=>'form-control','placeholder'=>'ejemplo: empresa@mail.com','pattern'=>'[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,3}']) !!}
            </div>

            <div class="form-group">
                    <label >Password: </label>
                  <input id="password" type="password" class="form-control" placeholder="Ingrese Contraseña" name="password">
                      </div>
            
            <!-- phone mask -->
            <div class="form-group">
              <label >Cargo: </label>
                {!! Form::select('cargo',['Administrativo'=>'Administrativo','Parqueo'=>'Parqueo'],null,['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                        <label >Fecha: </label>
                        <?php
                        $carbon = new \Carbon\Carbon();
                        $date = $carbon->now();
                         ?>
                        {!! Form::text('fecha',$date->format('d/m/Y'),['disabled','class'=>'form-control'])!!}
                    </div>
                    
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          <!-- /.box-body -->
      </div>

    </div>
    
    <!--/.col (right) -->
    <div class="col-md-6">
            <center>
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Acciones</h3>
                      </div>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <a type="submit" class="btn btn-primary" href="{!! asset('/') !!}">Cancelar</a>
                    <br>
                    <h6><span class="label label-warning">Tome Muy En Cuenta Que La Proxima Vez Que Inicia Sesion Lo Hara Con Los Datos Con El
                        Cual Ha Modificado</span></h6>
            
                  </div>

                  <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Logo Del Sistema</h3>
                        </div>
                        <img src="{!! asset('img/gano4.png') !!}" height="250px" width="500px"><br><br>
                    </div>
                </center>
          </div>
          <!-- /.box-body -->
  </div>

  {!!Form::close()!!}
  @endsection
