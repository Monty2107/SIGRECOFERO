<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{!! asset('img/gano4.png') !!}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Programador</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Administrador</a>
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
        <li><a href="{!! asset('admin/condominio/create') !!}"><i class="fa fa-circle-o"></i>Registrar</a></li>
        <li><a href="{!! asset('admin/buscar') !!}"><i class="fa fa-circle-o"></i>Buscar</a></li>
        {{-- <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i>Alquilar</a></li> --}}
        <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Reportes</a></li>
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
        <li><a href="{!! asset('admin/buscarCondomine') !!}"><i class="fa fa-circle-o"></i>Lista de Condomines</a></li>
        <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i>Reportes</a></li>
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
        <li><a href="{!! asset('admin/facturacion') !!}"><i class="fa fa-circle-o"></i>Emision</a></li>
        <li><a href="{!! asset('admin/facturacionBuscar') !!}"><i class="fa fa-circle-o"></i>Buscar</a></li>
        <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i>Reportes</a></li>
        <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Cuentas por Cobrar</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Seguridad</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i>Bitacora</a></li>
        <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i>Nuevo Usuario</a></li>
        <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i>Buscar Usuario</a></li>
        <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i>Backups de Base</a></li>
      </ul>
    </li>
    <li class="header">Contacto</li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Informacion del sistema</span></a></li>
  </ul>
</section>
