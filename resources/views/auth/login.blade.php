@extends('global.login')
@section('content')

<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
      <div class="login-logo">
          <img src="{!! asset('img/gano4.png') !!}" height="200px">
      </div>
    <p class="login-box-msg">Ingrese Credenciales Para Iniciar</p>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
      {{ csrf_field() }}

      <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
          <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <center>
          <div class="checkbox icheck">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Recordarme
            </label>
          </div>
          </center>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  
    <!-- /.social-auth-links -->
    <center>
    <a href="{{ url('/password/reset') }}">He Olvidado Mi Contraseña</a><br>
    </center>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
