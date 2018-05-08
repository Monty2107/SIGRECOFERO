<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGRECOFERO</title>
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }
    .example-modal .modal {
      background: transparent !important;
    }
  </style>

  <script>
  function mostrar(dato){
      if(dato=="Administrativo"){
          document.getElementById("anoPagoParqueo").style.display = "none";
          document.getElementById("anoPagoParqueo1").style.display = "none";
          document.getElementById("anoPagoAdmin").style.display = "block";
          document.getElementById("anoPagoAdmin1").style.display = "block";   
      }
      if(dato=="Parqueo"){
          document.getElementById("anoPagoAdmin").style.display = "none";
          document.getElementById("anoPagoAdmin1").style.display = "none";
          document.getElementById("anoPagoParqueo").style.display = "block";
          document.getElementById("anoPagoParqueo1").style.display = "block";
      }
  }
  </script>
  <script>
  function mostrarTabla(dato){
      if(dato=="Administrativo"){
        document.getElementById("tablaParqueo").style.display = "none";
        document.getElementById("tablaOtros").style.display = "none";
        document.getElementById("tablaAdmin").style.display = "block";
      }
      if(dato=="Parqueo"){
        document.getElementById("tablaAdmin").style.display = "none";
        document.getElementById("tablaOtros").style.display = "none";
        document.getElementById("tablaParqueo").style.display = "block";
      }
      if(dato=="Otros"){
        document.getElementById("tablaAdmin").style.display = "none";
        document.getElementById("tablaParqueo").style.display = "none";
        document.getElementById("tablaOtros").style.display = "block";
      }
  }
  </script>
  <script>
      function mostrarTabla2(dato){
          if(dato=="Administrativo"){ 
            document.getElementById("btnOtros").style.display = "none"        
            document.getElementById("btnParqueo").style.display = "none"
            document.getElementById("tablaParqueo").style.display = "none";
            document.getElementById("tablaOtros").style.display = "none";
            document.getElementById("btnAdmin").style.display = "block";
            document.getElementById("tablaAdmin").style.display = "block";
          }
          if(dato=="Parqueo"){
            document.getElementById("btnOtros").style.display = "none"
            document.getElementById("btnAdmin").style.display = "none";
            document.getElementById("tablaAdmin").style.display = "none";
            document.getElementById("tablaOtros").style.display = "none";
            document.getElementById("btnParqueo").style.display = "block"
            document.getElementById("tablaParqueo").style.display = "block";
    
          }
          if(dato=="Otros"){
            document.getElementById("btnParqueo").style.display = "none"
            document.getElementById("btnAdmin").style.display = "none";
            document.getElementById("tablaAdmin").style.display = "none";
            document.getElementById("tablaParqueo").style.display = "none";
            document.getElementById("btnOtros").style.display = "block"
            document.getElementById("tablaOtros").style.display = "block";
          }
      }
      </script>
  <script>
  function mostrarC(dato){
      if(dato=="Efectivo"){
          document.getElementById("NCheque").style.display = "none";
          document.getElementById("Cantidad").style.display = "block";
      }
      if(dato=="Cheque"){
          document.getElementById("NCheque").style.display = "block";
          document.getElementById("Cantidad").style.display = "block";
      }
  }
  </script>
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{!! asset('/') !!}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>CF</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIGRECOFERO</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{!! asset('img/gano4.png') !!}" class="user-image" alt="User Image">
              <span class="hidden-xs">Programador</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{!! asset('img/gano4.png') !!}" class="img-circle" alt="User Image">

                <p>
                  Monterrosa - Web Developer
                  <small>Diseño de Prueba 2018</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Cerrar Session</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('global.menu')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      {{-- <h1>
        Dashboard
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol> --}}

      @yield('posicion')
    </section>

    <!-- Main content -->
    <section class="content">
      @if(Session::has('message'))
      <div class="alert alert-info" id="alert" name="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         Mensaje: {{Session::get('message')}}
      </div>
      @endif
      @if(Session::has('error'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         Mensaje: <a class="alert-link" href="#">{{Session::get('error')}}</a>.
      </div>
      @endif
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('global.piePagina')


<!-- Bootstrap 3.3.7 -->

{!! Html::script('js/personal/jquery.js') !!}
{!!Html::script('js/personal/dropdown.js')!!}
{!! Html::script('js/personal/ajax.js') !!}
  
  {!! Html::script('js/personal/personal.js') !!}
  {!! Html::script('js/personal/data-mask.js') !!}
  {!! Html::script('js/personal/jquery.maskedinput.js') !!}
  {!!Html::style('css/personal/jquery.dataTables.min.css')!!}
  {!! Html::script('js/personal/jquery.dataTables.min.js') !!}
  {!! Html::script('js/personal/table.js') !!}
  {!!Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js')!!}
<!-- AdminLTE App -->
{!!Html::script('js/adminlte.min.js')!!}
{!!Html::script('js/adminlte.js')!!}
<script>
    $(document).ready(function(){
      $('#examples').DataTable({
        "order": [[1, "asc"]],
        "language":{
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrada de _MAX_ registros)",
          "loadingRecords": "Cargando...",
          "processing":     "Procesando...",
          "search": "Buscar:",
          "zeroRecords":    "No se encontraron registros coincidentes",
          "paginate": {
            "next":       "Siguiente",
            "previous":   "Anterior"
          },
        }
      });
    });
  
    </script>
    <script>
        $(document).ready(function(){
          $('#fact').DataTable({
            "order": [[1, "asc"]],
            "language":{
              "lengthMenu": "Mostrar _MENU_ registros por pagina",
              "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros disponibles",
              "infoFiltered": "(filtrada de _MAX_ registros)",
              "loadingRecords": "Cargando...",
              "processing":     "Procesando...",
              "search": "Buscar:",
              "zeroRecords":    "No se encontraron registros coincidentes",
              "paginate": {
                "next":       "Siguiente",
                "previous":   "Anterior"
              },
            }
          });
        });
      
        </script>
    <script>
    $(document).ready(function(){
      $('#examplee').DataTable({
        "order": [[1, "asc"]],
        "language":{
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrada de _MAX_ registros)",
          "loadingRecords": "Cargando...",
          "processing":     "Procesando...",
          "search": "Buscar:",
          "zeroRecords":    "No se encontraron registros coincidentes",
          "paginate": {
            "next":       "Siguiente",
            "previous":   "Anterior"
          },
        }
      });
    });
  
    </script>
{{-- Cierre script propio --}}
</body>
</html>