<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGRECOFERO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{-- diseños personales --}}
  <!-- Bootstrap 3.3.7 -->
  {!!Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css')!!}
  <!-- Font Awesome -->
  {!!Html::style('bower_components/font-awesome/css/font-awesome.min.css')!!}
  <!-- Ionicons -->
  {!!Html::style('bower_components/Ionicons/css/ionicons.min.css')!!}
  <!-- Theme style -->
  {!!Html::style('css/AdminLTE.min.css')!!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       {!!Html::style('css/skins/_all-skins.min.css')!!}

</head>
<body class="hold-transition login-page">
      <!-- Content Wrapper. Contains page content -->
          
        <!-- /.content -->
        
            <!-- Main content -->
            <section class="content">
              @yield('content')
             
            </section>
            <!-- /.content -->
      <!-- /.content-wrapper -->
      
      
    <!-- AdminLTE App -->
    {!!Html::script('js/adminlte.min.js')!!}
    {!!Html::script('js/adminlte.js')!!}
    {!!Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js')!!}
    {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('plugins/iCheck/icheck.min.js') !!}
    <script>
        $(function () {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
          });
        });
      </script>
    </body>
    </html>