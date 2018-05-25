<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Busqueda de Condomine</li>
 </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="table-responsive">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CODIGO</th>
              <th>CONDOMINE</th>
              <th>N° LOCAL</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
          <?php $s=1; ?>
        <?php $__currentLoopData = $condominiobusqueda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
              <td><?php echo e($s++); ?></td>
              <td><?php echo e($cb->codigo); ?></td>
              <td><?php echo e($cb->empresa->nombre); ?></td>
              <td><?php echo e($cb->NLocal); ?></td>
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="<?php echo e(route('pago.show',$cb->id)); ?>">Historial</a>
                <a class="btn btn-success btn-rounded" href="<?php echo e(route('pago.edit',$cb->id)); ?>">Pago</a>
                <a class="btn btn-warning btn-rounded" href="<?php echo e(route('nuevopago.edit',$cb->id)); ?>">Nuevo Pago</a>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>