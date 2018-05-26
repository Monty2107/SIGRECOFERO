<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Saldos de Antiguedad</li>
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
              <th>
                <input type="checkbox" name="dinamicos" id="dinamico" onClick="toggles(this)" />  SELECCIONAR TODOS
              </th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        <?php $__currentLoopData = $condominiobusqueda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
              <td><?php echo e($r++); ?></td>
              <td><?php echo e($cb->codigo); ?></td>
              <td><?php echo e($cb->nombre); ?></td>
              <td><?php echo e($cb->NLocal); ?></td>
              <td><input type="checkbox" name="dinamico" onClick="toggle(this)"> </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>
  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>