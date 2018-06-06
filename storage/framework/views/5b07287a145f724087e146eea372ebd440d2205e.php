<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Backups.</li>
 </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h3>Administrador de Backups</h3>
    <div class="row">
        
        <div class="col-xs-12 clearfix">
            <a id="create-new-backup-button" href="<?php echo e(url('admin/backup/createBase')); ?>" class="btn btn-info pull-right"
               style="margin-bottom:2em;"><i
                    class="fa fa-plus"></i> Crear Nuevo Backups solo base
            </a>
        </div>
        <div class="col-xs-12">
            <?php if(count($backups)): ?>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Archivo</th>
                        <th>Tamaño</th>
                        <th>Fecha</th>
                        <th>Año</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $backups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $backup): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php 
                    $fecha = explode('-',$backup['file_name']);
                    ?>
                        <tr>
                            <td><?php echo e($backup['file_name']); ?></td>
                            <td><?php echo e($backup['file_size']); ?></td>
                            <td>
                                <?php echo e($fecha[2].' - '.$fecha[1].' - '.$fecha[0]); ?>

                            </td>
                            <td>
                                <?php echo e($fecha[0]); ?>

                            </td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-info"
                                   href="<?php echo e(url('backup/download/'.$backup['file_name'])); ?>"><i
                                        class="fa fa-cloud-download"></i>Descargar</a>
                                <a class="btn btn-xs btn-danger" data-button-type="delete"
                                   href="<?php echo e(url('backup/delete/'.$backup['file_name'])); ?>"><i class="fa fa-trash-o"></i>
                                    Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="well">
                    <h4>No hay copias de seguridad</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>