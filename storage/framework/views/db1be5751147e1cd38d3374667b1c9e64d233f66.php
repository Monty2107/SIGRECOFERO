<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Emision de Facturas.</li>
 </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Datos de Facturacion</h3>
    </div>
    <?php
      # code...
      $estadoAdmin = SIGRECOFERO\estado::where('concepto','=','Administrativo')->get()->first();
      $estadoParqueo = SIGRECOFERO\estado::where('concepto','=','Parqueo')->get()->first();
      $estadoOtros = SIGRECOFERO\estado::where('concepto','=','Otros')->get()->first();
     ?>

      <div class="box-body">
        <label>Selecione el Concepto Para Ver Su Historial: </label><br>
        <?php if(!is_null($estadoAdmin)): ?>
        <?php echo e(Form::radio('radioConcepto','Administrativo',false,['onchange'=>'mostrarTabla(this.value);'])); ?>

        <label>Factura en Cuotas Administrativa </label> &nbsp;&nbsp;&nbsp;
        <?php endif; ?>
        <br>
        <?php if(!is_null($estadoParqueo)): ?>
        <?php echo e(Form::radio('radioConcepto','Parqueo',false,['onchange'=>'mostrarTabla(this.value);'])); ?>

        <label>Factura en Cuotas de Parqueo </label>
        <?php endif; ?>
        <br>
        <?php if(!is_null($estadoOtros)): ?>
        <?php echo e(Form::radio('radioConcepto','Otros',false,['onchange'=>'mostrarTabla(this.value);'])); ?>

        <label>Factura de Otras Cuotas </label>
        <?php endif; ?>
        </div>
  </div>
</div>

<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">ACCIONES</h3>
    </div>
      <div class="box-body">
          <span>SOLO ES PARA OBSERVACION, Y HACER MODIFICACIONES SI EN CASO LO NECESITARA
        ANTES DE SU DEBIDA EMISION.</span>
          </div>
  </div>
</div>
</div>

<input type="hidden" value="2" id="pagina" name="pagina">

<div class="table-responsive" id="tablaAdmin" style="display:none;">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CODIGO</th>
              <th >CONDOMINE</th>
              <th>CONCEPTO</th>
              <th>CANTIDAD  A PAGAR</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        <?php $__currentLoopData = $condomine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php 
              $facturacion = SIGRECOFERO\facturacion::where('id_Condominio','=',$c->id)->where('emision','=','No Emitido')->where('concepto','=','Administrativo')->first();
              ?>
          <tr>
              <?php if(!is_null($facturacion)): ?>
              <td><?php echo e($r++); ?></td>
              <td><?php echo e($c->codigo); ?></td>
              <td><?php echo e($c->empresa->nombre); ?></td>
              <td><?php echo e($facturacion->concepto); ?></td>
              <td align="center">$ <?php echo e($facturacion->cantidad); ?></td>
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="<?php echo e(route('condominio.edit',$c->id.'-'.'2')); ?>">Modificar</a>
              </td>
              <?php endif; ?>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>

<div class="table-responsive" id="tablaOtros" style="display:none;">
  <table id="examplee" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CODIGO</th>
              <th >CONDOMINE</th>
              <th>CONCEPTO</th>
              <th>CANTIDAD  A PAGAR</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        <?php $__currentLoopData = $condomine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php 
              $facturacion = SIGRECOFERO\facturacion::where('id_Condominio','=',$c->id)->where('emision','=','No Emitido')->where('concepto','=','Otros')->first();
              ?>
          <tr>
              <?php if(!is_null($facturacion)): ?>
              <td><?php echo e($r++); ?></td>
              <td><?php echo e($c->codigo); ?></td>
              <td><?php echo e($c->empresa->nombre); ?></td>
              <td><?php echo e($facturacion->concepto); ?></td>
              <td align="center">$ <?php echo e($facturacion->cantidad); ?></td>
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="<?php echo e(route('condominio.edit',$c->id.'-'.'2')); ?>">Modificar</a>
              </td>
              <?php endif; ?>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>

<div class="table-responsive" id="tablaParqueo" style="display:none;">
  <table id="examples" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CODIGO</th>
              <th >CONDOMINE</th>
              <th>CONCEPTO</th>
              <th>CANTIDAD  A PAGAR</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        <?php $__currentLoopData = $condomine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php 
              $facturacion = SIGRECOFERO\facturacion::where('id_Condominio','=',$c->id)->where('emision','=','No Emitido')->where('concepto','=','Parqueo')->first();
              ?>
          <tr>
              <?php if(!is_null($facturacion)): ?>
              <td><?php echo e($r++); ?></td>
              <td><?php echo e($c->codigo); ?></td>
              <td><?php echo e($c->empresa->nombre); ?></td>
              <td><?php echo e($facturacion->concepto); ?></td>
              <td align="center">$ <?php echo e($facturacion->cantidad); ?></td>
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="<?php echo e(route('condominio.edit',$c->id.'-'.'2')); ?>">Modificar</a>
              </td>
              <?php endif; ?>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>

<section class="content">
    <div class="modal modal-info fade" id="modal-infoAdmin">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Advertencia</h4>
          </div>
          <div class="modal-body">
            <p>Si llega a Aceptar, Se Generara la Factura del Siguiente Mes y no podra<br>
              Emitir la Factura De Un Mes Anterior A Solo Si Es Anulada.
              <br>
              Siga la Siguientes Instrucciones: <br>
              1- Asegurese que la Informacion Este Bien Escrita.<br>
              Si esta Desea Cambiarlo Solo Precione el Boton de Modificar <br>
              del Condomine que va a Modificar.<br>
              2- Que Este Listado Todos los Condomines que Generara Factura.<br>
              3- Que Los Precios Sean Adecuados a Los Condomines, <br>
              Sino Fuere Asi Vaya Al boton de Modificar.
              <br><br>
              Esta seguro de Imprimir Las Facturas?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            
            <a class="btn btn-outline" href="<?php echo e(asset('admin/facturacionAdmin')); ?>" onclick="javascript:window.location.reload();" target="_blank" >Si Acepto.</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<!-- /.content -->

<section class="content">
    <div class="modal modal-info fade" id="modal-infoParqueo">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Advertencia</h4>
          </div>
          <div class="modal-body">
            <p>Si llega a Aceptar, Se Generara la Factura del Siguiente Mes y no podra<br>
              Emitir la Factura De Un Mes Anterior A Solo Si Es Anulada.
              <br>
              Siga la Siguientes Instrucciones: <br>
              1- Asegurese que la Informacion Este Bien Escrita.<br>
              Si esta Desea Cambiarlo Solo Precione el Boton de Modificar <br>
              del Condomine que va a Modificar.<br>
              2- Que Este Listado Todos los Condomines que Generara Factura.<br>
              3- Que Los Precios Sean Adecuados a Los Condomines, <br>
              Sino Fuere Asi Vaya Al boton de Modificar.
              <br><br>
              Esta seguro de Imprimir Las Facturas?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <a class="btn btn-outline" href="<?php echo e(asset('admin/facturacionParqueo')); ?>" onclick="javascript:window.location.reload();" target="_blank">Si Acepto</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<!-- /.content -->

<section class="content">
    <div class="modal modal-info fade" id="modal-infoOtros">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Advertencia</h4>
          </div>
          <div class="modal-body">
            <p>Si llega a Aceptar, Se Generara la Factura del Siguiente Mes y no podra<br>
              Emitir la Factura De Un Mes Anterior A Solo Si Es Anulada.
              <br>
              Siga la Siguientes Instrucciones: <br>
              1- Asegurese que la Informacion Este Bien Escrita.<br>
              Si esta Desea Cambiarlo Solo Precione el Boton de Modificar <br>
              del Condomine que va a Modificar.<br>
              2- Que Este Listado Todos los Condomines que Generara Factura.<br>
              3- Que Los Precios Sean Adecuados a Los Condomines, <br>
              Sino Fuere Asi Vaya Al boton de Modificar.
              <br><br>
              Esta seguro de Imprimir Las Facturas?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <a class="btn btn-outline" href="<?php echo e(asset('admin/facturacionOtros')); ?>" onclick="javascript:window.location.reload();" target="_blank">Si Acepto</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<!-- /.content -->

<section class="content">
    <div class="modal modal-info fade" id="modal-infoAll">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Advertencia</h4>
          </div>
          <div class="modal-body">
            <p>Si llega a Aceptar, Se Generara la Factura del Siguiente Mes y no podra<br>
              Emitir la Factura De Un Mes Anterior A Solo Si Es Anulada.
              <br>
              Siga la Siguientes Instrucciones: <br>
              1- Asegurese que la Informacion Este Bien Escrita.<br>
              Si esta Desea Cambiarlo Solo Precione el Boton de Modificar <br>
              del Condomine que va a Modificar.<br>
              2- Que Este Listado Todos los Condomines que Generara Factura.<br>
              3- Que Los Precios Sean Adecuados a Los Condomines, <br>
              Sino Fuere Asi Vaya Al boton de Modificar.
              <br><br>
              Esta seguro de Imprimir Las Facturas?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <a class="btn btn-outline" href="<?php echo e(asset('admin/facturacion/create')); ?>" onclick="javascript:window.location.reload();" target="_blank">Si Acepto</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>