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
          document.getElementById("descripcion").style.display = "none";
          <?php $m = 'Adminitracion' ?>
      }
      if(dato=="Parqueo"){
          document.getElementById("descripcion").style.display = "none";
      }
      if(dato=="Otros"){
          document.getElementById("descripcion").style.display = "block";
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
  <script src="js/personal/ajax.js"></script>
  {!! Html::script('js/personal/ajax.js') !!}
  {!! Html::script('js/personal/jquery.js') !!}
  {!! Html::script('js/personal/personal.js') !!}
  {!! Html::script('js/personal/data-mask.js') !!}
  {!! Html::script('js/personal/jquery.maskedinput.js') !!}
  {!!Html::style('css/personal/jquery.dataTables.min.css')!!}
  {!! Html::script('js/personal/jquery.dataTables.min.js') !!}
  {!! Html::script('js/personal/table.js') !!}
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
      <label class="label-warning">Ultima Actualizacion: 15/Abril/2018</label><br>
      <center>
        <label>LOGO DEL SISTEMA.
        </label><br>
      <img src="img/gano4.png" height="200px"><br><br>

      <label class="label-success">
        MODULOS Y ACCIONES YA PROGRAMADAS, Y ACTUALIZADAS.<br><br>
        1- Modulo de Condominio <br>
          1.1 Registrar Codominio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.2 Buscar Condominio <br>
          1.3 Ver Condominio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          1.4 Modificar Condomine<br>
          1.5 Eliminar Condominio <br>
          1.6 Generador de Pagos desde años antiguos hasta la actualidad<br><br>
        2- Modulo de pago diario <br>
          2.1 Buscar Condomine para pago&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          2.2 Realizar pago de varios meses<br>
          2.2 Historial de pagos
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          2.3 Realizar pago de un mes, Viendo el historial
      </label>
      </center>
      <br><br>

      <label>Condiciones del servidor:<br>
1- El servidor es de pruebas por lo cual habran horas que se desabilitara para hacer las correspondientes actualizaciones y asi puedan visualizarlas despues.<br>
2- La configuracion del servidor ha sido hechas por mi persona, por el cual se asegura la credibilidad del sistema, y sus avances, para llegar a su entrega final.<br>
3- El enlace solo ha sido compartido a la empresa, para que puedan acceder a dicho servidor, y solo ellos sabran como o a quienes distribuirlo para puedan asi acceder.<br>
4- El servidor fue creado, configurado con el fin de que la empresa pueda ver su evolucion del sistema, y hacer las pruebas de dichos modulos ya programados.<br>
<br>
<br>
Ventajas:<br>
1- Interactividad inmediata del cliente-usuario al sistema en su etapa de desarrollo y asi puedan visualizar el avance o evolucion que va teniendo dicho sistema.<br>
2- Podra acceder a dicho servidor de cualquier dipostivo que tenga accesso a internet, esto evitando tediosas configuraciones.<br>
3- El servidor es administrado, monitoriado por mi persona asi evitar perdida de informacion, o clonacion del sistema, teniendo un registro detallado de los accesos, horas, tiempo y acciones que han hecho en el sistema.<br>
4- Evitar inconvenientes cuando se haga una entrega final, ya que el cliente-usuario ya va teniendo interaccion con el sistema asi poder evitar lo mas minimo de errores.<br>
5-Capacitacion personalizada, al tener el sistema en este caso el enlace del servidor donde se aloja el sistema, el cliente-usuario podra interactuar con el y asi poder acostumbrarse, como aprendender del sistema.<br>
<br><br>
Aclaraciones: Por este medio se estan asiendo las pruebas de sistema, por lo cual al finalizar el sistema el servidor estara 7 dias activo mas, asi puedan acceder a el hacer las pruebas o correcciones que la empresa solicite, <br>
luego de ese tiempo se va a coordinar con el area administrativa para la instalacion, <br>
configuracion, he implementacion de sistema a nivel local(Solo la empresa podra acceder a el),<br>
y del servidor sera eliminado los archivos del sistema, como dicho servidor. Asi no tener ningun inconvenientes y facilitar la instalacion ,rapida adaptacion del sistema y Uso de dicho sistema sin ningun inconveniente<br>
</label>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('global.piePagina')


<!-- Bootstrap 3.3.7 -->
{!!Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js')!!}
<!-- AdminLTE App -->
{!!Html::script('js/adminlte.min.js')!!}

{{-- Cierre script propio --}}
</body>
</html>
