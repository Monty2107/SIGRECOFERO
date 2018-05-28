<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{!! asset('img/gano4.png') !!}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{Auth::User()->name}}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> {{Auth::User()->cargo}}</a>
    </div>
  </div>
  <!-- search form -->

  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu de Navegacion</li>
    <li class="active treeview">
      <li><a href="{!! asset('/') !!}"><i class="fa fa-dashboard"></i> <span>Panel Principal</span></a></li>
    </li>
    <?php if(Auth::User()->cargo == "Financiero" || Auth::User()->cargo == "Administracion"){ ?>
    <li class="treeview">
      <a href="#">

        <i class="fa fa-files-o"></i>
        <span>Condominios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        <!-- <span class="pull-right-container">
          <span class="label label-primary pull-right">4</span>
        </span> -->
      </a>
      <ul class="treeview-menu">
        <?php if(Auth::User()->cargo == "Administracion"){ ?>
        <li><a href="{!! asset('admin/condominio/create') !!}"><i class="fa fa-circle-o"></i>Registrar</a></li>
        <li><a href="{!! asset('admin/buscar') !!}"><i class="fa fa-circle-o"></i>Buscar</a></li>
        {{-- <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i>Alquilar</a></li> --}}
        
        <?php } ?>
        <li><a href="{!! asset('admin/reportebuscar') !!}"><i class="fa fa-circle-o"></i>Reportes</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-edit"></i>
        <span>Pagos Diarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          <?php if(Auth::User()->cargo == "Administracion"){ ?>
        <li><a href="{!! asset('admin/buscarCondomine') !!}"><i class="fa fa-circle-o"></i>Lista de Condomines</a></li>
        <?php } ?>
        <li><a href="{!! asset('admin/pagoMes') !!}"><i class="fa fa-circle-o"></i>Ingresos</a></li>
        <li><a href="{!! asset('admin/pagoReporte') !!}"><i class="fa fa-circle-o"></i>Reportes</a></li>
        
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-th"></i>
        <span>Facturacion</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        <!-- <span class="pull-right-container">
          <span class="label label-primary pull-right">4</span>
        </span> -->
      </a>
      <ul class="treeview-menu">
          <?php if(Auth::User()->cargo == "Financiero" ){ ?>
        <li><a href="{!! asset('admin/facturacion') !!}"><i class="fa fa-circle-o"></i>Emision</a></li>
        
        
        <?php } ?>
        <?php if(Auth::User()->cargo == "Financiero" || Auth::User()->cargo == "Administracion" ){ ?>
        <li><a href="{!! asset('admin/facturacionBuscar') !!}"><i class="fa fa-circle-o"></i>Buscar</a></li>
        <li><a href="{!! asset('admin/cuenta') !!} "><i class="fa fa-circle-o"></i>Cuentas por Cobrar</a></li>
        <li><a href="{!! asset('admin/saldo_Antiguo') !!}"><i class="fa fa-circle-o"></i>Saldos Antiguos</a></li>
        
        <?php } ?>
        <?php if(Auth::User()->cargo == "Administracion" ){ ?>
          <li><a href="{!! asset('admin/VerFacturacion') !!}"><i class="fa fa-circle-o"></i>Ver Facturacion</a></li>
        <?php } ?>
        
      </ul>
    </li>
    <?php } ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Seguridad</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">

        <li><a href="{!! asset('admin/Bitacora') !!}"><i class="fa fa-circle-o"></i>Bitacora</a></li>
        <?php if(Auth::User()->cargo == "Programador" ){ ?>
        <li><a href="{!! asset('admin/usuario/create') !!}"><i class="fa fa-circle-o"></i>Nuevo Usuario</a></li> 
      <!--  <li><a href="{!! asset('admin/usuario/show') !!}"><i class="fa fa-circle-o"></i>Buscar Usuario</a></li> -->
        <?php } ?>
        <?php if(Auth::User()->cargo == "Financiero" || Auth::User()->cargo == "Administracion" || Auth::User()->cargo == "Programador" ){ ?>
        <li><a href="{!! asset('admin/backup') !!}"><i class="fa fa-circle-o"></i>Backups de Base</a></li>
        <?php } ?>
      </ul>
    </li>
    <li class="header">Contacto</li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Informacion del sistema</span></a></li>
  </ul>
</section>
