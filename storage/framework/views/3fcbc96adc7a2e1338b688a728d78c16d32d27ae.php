<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Numero de Recibos De Los Pagos Mensuales</li>
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
  <?php echo Form::model($estado,['route' => ['pago.update',$estado->id], 'method' => 'PUT','id'=>'form']); ?>


  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <?php
          # code...
          $estadoC = \SIGRECOFERO\estado::find($estado->id);
          $facturacion = \SIGRECOFERO\facturacion::where('id_Estado',$estadoC->id)->get()->first();

         ?>
           <div class="form-group">
             <label> <?php echo e($estadoC->mes); ?> :</label>
            &nbsp&nbsp <?php echo Form::text('factura',null,['name'=>'factura','id'=>'factura','class'=>'form-control','placeholder'=>'Escriba el Numero de Factura del Mes Correspondiente']); ?>

            <input type="hidden" name="mes" value="<?php echo e($estadoC->mes); ?>">
           </div>
           <div class="form-group" id="opciones">
             <label>Selecione la Forma de Pago: </label>
             <br>
             <?php echo e(Form::radio('radioPago','Efectivo',false,['onchange'=>'mostrarC(this.value);'])); ?>

             <label>Efectivo </label> &nbsp;&nbsp;&nbsp;
             <?php echo e(Form::radio('radioPago','Cheque',false,['onchange'=>'mostrarC(this.value);'])); ?>

             <label>Cheque</label>
           </div>
           <div class="form-group" id="NBanco" style="display:none;">
            <label >Ingrese el Nombre Del Banco: </label>
            <?php echo Form::text('NBanco',null,['name'=>'NBanco','id'=>'NBanco','class'=>'form-control','placeholder'=>'Nombre Del Banco...']); ?>

          </div>
           <div class="form-group" id="NCheque" style="display:none;">
             <label >Ingrese el N° de Cheque: </label>
             <?php echo Form::text('NCheque',null,['name'=>'NCheque','id'=>'NCheque','class'=>'form-control','placeholder'=>'### ###']); ?>

           </div>
           <div class="form-group" id="Cantidad" style="display:none;">
             <label >Cantidad: </label>
             <?php echo Form::text('cantidad',null,['name'=>'cantidad','id'=>'cantidad','class'=>'form-control','placeholder'=>'$$']); ?>

           </div>
           <?php if($estadoC->concepto == 'Otros'): ?>
             <div class="form-group" >
               <label >Descripcion: </label>
               <?php echo Form::textarea('descripcion',$estadoC->descripcion.' Con Pago de : $ '.$facturacion->cantidad,['rows'=>'3','name'=>'descripcion','id'=>'descripcion','class'=>'form-control','disabled']); ?>

               <input type="hidden" name="descripcion" value="<?php echo e($estadoC->descripcion.' Con Pago de : $ '.$facturacion->cantidad); ?>">
             </div>
           <?php endif; ?>
      </div>
      <input type="hidden" name="radioConcepto" value="<?php echo e($estadoC->concepto); ?>">
      <input type="hidden" name="ano" value="<?php echo e($estadoC->ano); ?>">
      <input type="hidden" name="id_Condominio" value="<?php echo e($estadoC->id_Condominio); ?>">
      <input type="hidden" name="Mes[]" value="<?php echo e($estadoC->mes); ?>">
    </div>
          <!-- /.box-body -->
          <!--/.col (right) -->
    <div class="col-md-6">
      <!-- general form elements -->
    <center>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Acciones</h3>
          </div>
          <button type="submit" class="btn btn-success">
            HACER PAGO
          </button>
        
      </div>
    </center>
  </div>
  </div>

  <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>