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
<?php if(count($errors) > 0): ?>
      <div class="alert alert-danger" role="alert">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
      </div>
      <?php endif; ?>
<?php echo Form::open(['route' => 'saldo_Antiguo.store', 'method' => 'POST','id'=>'form']); ?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Generacion de Saldos Antiguos</h3>
      </div>
      <!-- /.box-header -->

        <div class="box-body">
            <div class="col-md-6">
              <div class="form-group">
                  <label >Fecha Inicio : </label>
                  <?php echo Form::date('fechaInicial',null,['name'=>'fechaInicial','id'=>'fechaInicial','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']); ?>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label >Fecha Final: </label>
                  <?php echo Form::date('fechaFinal',null,['name'=>'fechaFinal','id'=>'fechaFinal','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']); ?>

              </div>

              <div class="col-md-6">

            </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-rounded">Generar Reporte</button>
                      </div>
              <!-- /.input group -->
            </div>

            </div>
            
  
          <!-- /.form group -->
        <!-- /.box-body -->
    </div>
  </div>
  </div>

  

  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Condominios</h3>
      </div>
      <div class="box-body">
  <div class="table-responsive">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th>ENCARGADO</th>
              <th>CONDOMINE</th>
              <th>N° LOCAL</th>
              <th>
                 SELECCIONE EL/LOS CONDOMINIO
              </th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $r=1; ?>
        <?php $__currentLoopData = $condominiobusqueda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
              <td><?php echo e($r++); ?></td>
              <td><?php echo e($cb->nombre); ?></td>
              <td><?php echo e($cb->empresa->nombre); ?></td>
              <td><?php echo e($cb->NLocal); ?></td>
          <td><input type="checkbox" name="seleccionar[]" value="<?php echo e($cb->id); ?>" onClick="toggle(this)"><?php echo e(' '.$cb->codigo); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>
  
</div>
<!-- /.form group -->
<!-- /.box-body -->
</div>
</div>
</div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>