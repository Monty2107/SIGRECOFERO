<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Registro de Condominios</li>
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
  <?php echo Form::open(['route' => 'condominio.store', 'method' => 'POST','id'=>'form']); ?>


  <div class="row">
      
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro General</h3>
        </div>
        <!-- /.box-header -->

          <div class="box-body">
            <div class="form-group">
              <label>Nombre del Condominio: </label>
              <?php echo Form::text('nombreCondominio',null,['name'=>'nombreCondominio','id'=>'nombreCondominio','class'=>'form-control','placeholder'=>'Nombre del Condomine']); ?>

            </div>
            <div class="form-group">
                <label>Nombre del Contacto: </label>
                <?php echo Form::text('nombreContacto',null,['name'=>'nombreContacto','id'=>'nombreContacto','class'=>'form-control','placeholder'=>'Nombre del Contacto']); ?>

              </div>
            <div class="form-group">
              <label >Correo: </label>
              <?php echo Form::email('correo',null,['id'=>'correo','name'=>'correo','class'=>'form-control','placeholder'=>'ejemplo: empresa@ymail.com','pattern'=>'[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,3}']); ?>

            </div>
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Fijo: </label>
                <?php echo Form::text('telefonoFijo',null,['name'=>'telefonoFijo','class'=>'form-control','id'=>'telefonoFijo', 'placeholder'=>'(999) 9999-9999']); ?>

                </div>
              <!-- /.input group -->

            <!-- /.form group -->
            <!-- phone mask -->
            <div class="form-group">
              <label >Telefono Movil: </label>
                <?php echo Form::text('telefonoMovil',null,['id'=>'telefonoMovil','class'=>'form-control','id'=>'telefonoMovil', 'placeholder'=>'(999) 9999-9999']); ?>

                </div>
              <!-- /.input group -->
              <div class="form-group">
                  <label>Observaciones: </label>
                  <?php echo Form::textarea('observaciones',null,['name'=>'observaciones','id'=>'observaciones','class'=>'form-control','placeholder'=>'Ingrese las Observaciones si en caso lo hubiese..']); ?>

                </div>
            
            <!-- /.form group -->
          <!-- /.box-body -->
      </div>
    </div>
    </div>
    <!--/.col (right) -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Codigo: </label>
              <?php echo Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo']); ?>

            </div>
            <div class="form-group">
              <label >N° de Local a Emitir la Factura: </label>
              <?php echo Form::text('NLocal',null,['name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-I]{1})-[0-9]{3}','title'=>'Solo letras mayuscula de la letra A hasta la letra I']); ?>

            </div>
            <div class="form-group">
                <label >Cantidad De Saldo Antiguo: </label>
                <?php echo Form::number('antiguo',null,['name'=>'antiguo','id'=>'antiguo','class'=>'form-control','placeholder'=>'$$$','step'=>'any']); ?>

                <h6>Si No Agrega Valor Tomara Como Defecto El valor De : $0 </h6>
              </div>
            <div class="form-group">
                <label >Cantidad a Pagar en Factura Administrativa: </label>
                <?php echo Form::number('cantidadAdmin',null,['name'=>'cantidadAdmin','id'=>'cantidadAdmin','class'=>'form-control','placeholder'=>'$$$','step'=>'any']); ?>

                <h6>Si No Agrega Valor Tomara Como Defecto El valor De : $50 </h6>
              </div>
              <div class="form-group">
                  <label >Cantidad a Pagar en Factura Parqueo: </label>
                  <?php echo Form::number('cantidadParqueo',null,['name'=>'cantidadParqueo','id'=>'cantidadParqueo','class'=>'form-control','placeholder'=>'$$$','step'=>'any']); ?>

                  <h6>Si No Agrega Valor Tomara Como Defecto El valor De : $15</h6>
                </div>
            <div class="form-group">
              <label >Año De Iniciacion de Facturacion: </label>
              <?php echo Form::text('facturacion',null,['name'=>'facturacion','id'=>'facturacion','class'=>'form-control','placeholder'=>'9999','pattern'=>'[0-9]{4}']); ?>

            </div>
            <div class="form-group">
                <label>Selecione Las Opciones para Generar Las Cuotas: </label>
                <br>
                <?php echo e(Form::select('opciones[]',['Administrativo'=>'Administrativo','Parqueo'=>'Parqueo'],null,
                ['class'=>'form-control','multiple'=>'true'])); ?>

                <h6>Mantenga Presionado la tecla: Crtl o Control, y asi seleccione las Opciones, dando clic en ellos</h6>
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
              <button type="submit" class="btn btn-primary">Aceptar</button>
              <a type="submit" class="btn btn-primary" href="<?php echo asset('admin/buscar'); ?>">Cancelar</a>
              <br>
        
            </div>
          </center>
  </div>

 
</div>

  <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>