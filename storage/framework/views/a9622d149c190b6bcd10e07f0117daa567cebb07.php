<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Agregar nuevo Pago.</li>
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
<?php echo Form::model($condomine,['route' => ['nuevopago.update',$condomine->id], 'method' => 'PUT','id'=>'form']); ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <!-- /.box-header -->
        <?php
        $emp = SIGRECOFERO\condominio::where('id_Empresa', $condomine->id)->get()->first();
        // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
         ?>

          <div class="box-body">
              <div class="form-group" >
                  <label >Descripcion: </label>
                  <?php echo Form::textarea('descripcion',null,['rows'=>'3','name'=>'descripcion','id'=>'descripcion','class'=>'form-control','placeholder'=>'Escriba la razon del Pago....']); ?>

                </div>
                <div class="form-group">
                    <label >Fecha De Iniciacion de Facturacion: </label>
                    <?php echo Form::date('fechaInicial',null,['name'=>'fechaInicial','id'=>'fechaInicial','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']); ?>

                </div>
                <div class="form-group">
                    <label >Fecha De Finalizacion De Facturacion: </label>
                    <?php echo Form::date('fechaFinal',null,['name'=>'fechaFinal','id'=>'fechaFinal','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}','title'=>'']); ?>

                </div>
                <div class="form-group">
                        <label >Cantidad: </label>
                        <?php echo Form::number('cantidad',null,['name'=>'cantidad','id'=>'cantidad','class'=>'form-control','placeholder'=>'$$','step'=>'any']); ?>

                      </div>

              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          <!-- /.box-body -->
      </div>
    </div>
    <!--/.col (right) -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Informacion General</h3>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
                <div class="form-group">
                        <label>Nombre del Condominio: </label>
                        <?php echo Form::text('nombre',$emp->empresa->nombre,['name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado del Condomine','disabled']); ?>

                      </div>
            <div class="form-group">
              <label>Codigo: </label>
              <?php echo Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo','disabled']); ?>

            </div>
            <div class="form-group">
              <label >N° de Local: </label>
              <?php echo Form::text('NLocal',null,['name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}','title'=>'Solo letras mayuscula de la letra A hasta la letra F','disabled']); ?>

            </div>
              <!-- /.input group -->
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.box-body -->
    <center>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Acciones</h3>
          </div>
        <button type="submit" class="btn btn-primary">Agregar Nuevo Pago</button>
        <a type="submit" class="btn btn-primary" href="<?php echo asset('admin/buscar'); ?>">Cancelar</a>
        <br>

      </div>
    </center>
  </div>
  </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>