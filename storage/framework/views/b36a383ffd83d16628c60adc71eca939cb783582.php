<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Cuentas Por Cobrar.</li>
 </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="col-md-12" id="tablaAnulada">
        <div class="box box-primary">
          <div class="box-header with-border">
            <center>
            <h3 class="box-title">REPORTES DE CUENTAS POR COBRAR</h3>
            </center>
          </div>
    <div class="table-responsive" >
      <table id="exampli" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
              <tr>
                  <th width="50px">N°</th>
                  <th>MES</th>
                  <th>AÑO</th>
                  <th>CONCEPTO</th>
                  <th>FECHA DE CREACION</th>
                  <th>ACCIONES</th>
              </tr>
          </thead>
          <tbody class="busqueda">
                <?php $t4=1; 
            
                ?>
            <?php $__currentLoopData = $cuenta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php $fecha = \SIGRECOFERO\fecha::find($c->id_Fecha);  ?>
              <tr>
                  <?php if($c->concepto == 'Todas'){?>
                  <td><?php echo e($t4++); ?></td>
                  <td><?php echo e($c->mes); ?></td>
                  <td><?php echo e($c->ano); ?></td>
                  <td><?php echo e($c->concepto); ?></td>
                  <td><?php echo e($fecha->dia.' / '.$fecha->mes.' / '.$fecha->ano); ?></td>
                  <td>
                        <a class="btn btn-info btn-rounded" href="<?php echo e(asset('admin/VerCuenta').'/'.$c->id); ?>" target="_blank">VER</a>
                        <a class="btn btn-info btn-rounded" href="<?php echo e(asset('admin/DescargarCuenta').'/'.$c->id); ?>" target="_blank">DESCARGAR</a>
                  </td>
                  <?php }?>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </tbody>
      </table>
    </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>