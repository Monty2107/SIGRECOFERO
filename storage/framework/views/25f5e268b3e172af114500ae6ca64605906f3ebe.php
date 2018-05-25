<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Buscar Facturas Emitidas a Los Condomine.</li>
 </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Datos de Facturacion Listado de Condomine</h3>
        </div>
<div class="table-responsive" id="tablaAdmin">
    <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
        <thead>
            <tr>
                <th width="50px">N°</th>
                <th >CODIGO</th>
                <th >CONDOMINE</th>
                <th>N° DE LOCAL A FACTURAR</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody class="busqueda">
          <?php $r=1; ?>
          <?php $__currentLoopData = $condomine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($r++); ?></td>
                <td><?php echo e($c->codigo); ?></td>
                <td><?php echo e($c->empresa->nombre); ?></td>
                <td align="center"><?php echo e($c->NLocal); ?></td>
                <td width="250px">
                  <a class="btn btn-info btn-rounded" href="<?php echo e(route('facturacion.show',$c->id.'-'.'0')); ?>">Ver Historial</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>