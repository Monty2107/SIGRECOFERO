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

  <?php echo Form::model($condomine,['route' => ['pago.update',$condomine->id], 'method' => 'PUT','id'=>'form']); ?>


  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro Administrativo</h3>
        </div>
        <?php

        // dd($arrayMes1);
        $countmes = count($arrayMes1);
        $date = \Carbon\Carbon::now();
        $val = \SIGRECOFERO\estado::where('ano','=',$anoPago)->where('concepto','=',$concepto1)->where('id_Condominio',$condomine->id)->where('mes','=',$arrayMes1[0])->get()->first();
        $fecha = \SIGRECOFERO\fecha::find($val->id_Fecha);
          # code...
          // dd($fecha->id);
          for ($i=0; $i < $countmes ; $i++) {
            # code...
            $meses = \SIGRECOFERO\estado::where('mes','=',$arrayMes1[$i])->where('ano','=',$anoPago)->where('concepto','=',$concepto1)->where('id_Condominio',$condomine->id)->where('id_Fecha','=',$fecha->id)->get();
            $concepto = \SIGRECOFERO\estado::where('mes','=',$arrayMes1[$i])->where('ano','=',$anoPago)->where('concepto','=',$concepto1)->where('id_Condominio',$condomine->id)->where('id_Fecha','=',$fecha->id)->get()->first();
            
         ?>
         

         <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $as): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
           <div class="form-group">
             <label> <?php echo e($as->mes); ?> :</label>
            &nbsp&nbsp <?php echo Form::text('factura[]',null,['name'=>'factura[]','id'=>'factura','class'=>'form-control','placeholder'=>'Escriba el Numero de Factura del Mes Correspondiente','required','title'=>'Ingrese el numero de factura']); ?>

            <input type="hidden" name="mes[]" value="<?php echo e($as->mes); ?>">
           </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
         <?php   }    ?>
         
      </div>
      <input type="hidden" name="pagina" value="2">
      <input type="hidden" name="radioConcepto" value="<?php echo e($concepto->concepto); ?>">
      <input type="hidden" name="ano" value="<?php echo e($concepto->ano); ?>">
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