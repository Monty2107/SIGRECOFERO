<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
 <li class="active">Nuevo Usuario</li>
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
<?php echo Form::open(['route' => 'usuario.store', 'method' => 'POST','id'=>'form']); ?>




  <div class="row">
    <!-- left column -->
    
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Crear Usuario</h3>
        </div>
          <div class="box-body">
            <div class="form-group">
              <label>Su Nombre: </label>
              <?php echo Form::text('nombre',null,['name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Ingrese Su Nombre.....']); ?>

            </div>
            
            <div class="form-group">
              <label >Correo: </label>
              <?php echo Form::email('correo',null,['id'=>'correo','name'=>'correo','class'=>'form-control','placeholder'=>'ejemplo: empresa@mail.com','pattern'=>'[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,3}']); ?>

            </div>

            <div class="form-group">
                    <label >Password: </label>
                  <input id="password" type="password" class="form-control" placeholder="Ingrese Contraseña" name="password">
                      </div>
            
            <!-- phone mask -->
            <div class="form-group">
              <label >Cargo: </label>
                <?php echo Form::select('cargo',['Administracion'=>'Administracion','Financiero'=>'Financiero'],null,['class'=>'form-control']); ?>

                </div>

                <div class="form-group">
                        <label >Fecha: </label>
                        <?php
                        $carbon = new \Carbon\Carbon();
                        $date = $carbon->now();
                         ?>
                        <?php echo Form::text('fecha',$date->format('d/m/Y'),['disabled','class'=>'form-control']); ?>

                    </div>
                    
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          <!-- /.box-body -->
      </div>

    </div>
    
    <!--/.col (right) -->
    <div class="col-md-6">
            <center>
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Acciones</h3>
                      </div>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <a type="submit" class="btn btn-primary" href="<?php echo asset('/'); ?>">Cancelar</a>
                    <br>
                    <h6><span class="label label-warning">Tome Muy En Cuenta Que La Proxima Vez Que Inicia Sesion Lo Hara Con Los Datos Con El
                        Cual Ha Modificado</span></h6>
            
                  </div>

                  <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Logo Del Sistema</h3>
                        </div>
                        <img src="<?php echo asset('img/gano4.png'); ?>" height="250px" width="500px"><br><br>
                    </div>
                </center>
          </div>
          <!-- /.box-body -->
  </div>

  <?php echo Form::close(); ?>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>