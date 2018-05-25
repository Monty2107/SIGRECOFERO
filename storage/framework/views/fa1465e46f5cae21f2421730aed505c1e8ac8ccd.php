<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Pagos Mensuales</li>
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
<?php echo Form::model($condomine,['route' => ['pago.update',$condomine->id], 'method' => 'PUT','id'=>'form']); ?>


<div class="row">
  <!-- left column -->
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Registro Administrativo</h3>
      </div>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group" id="opciones">
            <label>Selecione el Concepto: </label>
            <br>
            <?php
            $admin = \SIGRECOFERO\estado::where('id_Condominio','=',$condomine->id)->where('concepto','=','Administrativo')->get()->first();
            $parqueo = \SIGRECOFERO\estado::where('id_Condominio','=',$condomine->id)->where('concepto','=','Parqueo')->get()->first();
             // dd($parqueo);
             ?>
             <?php if(!$admin): ?>
             <?php else: ?>
               <?php echo e(Form::radio('radioConcepto','Administrativo',false,['onchange'=>'mostrar(this.value);'])); ?>

               <label>Cuota de Adminitracion </label> &nbsp;&nbsp;&nbsp;
             <?php endif; ?>
             <?php if(!$parqueo): ?>
             <?php else: ?>
               <?php echo e(Form::radio('radioConcepto','Parqueo',false,['onchange'=>'mostrar(this.value);'])); ?>

               <label>Cuota de Parqueo </label>&nbsp;&nbsp;&nbsp;
             <?php endif; ?>

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

          </div >

         
          <div id="anoPagoAdmin" style="display:none">
              <?php if(!is_null($admin)): ?>
          <div class="form-group">      
            <label >En Que Año Va A Pagar: </label>
            <?php
            $date = \Carbon\Carbon::now();

            $busqueda = \SIGRECOFERO\estado::where('id_Condominio',$condomine->id)->where('ano','<=',$date->format('Y'))->get()->first();
            $count2 = $busqueda->ano;
            for ($i= $count2; $i <= $date->format('Y') ; $i++) {
              $busquedas = \SIGRECOFERO\estado::where('concepto','=','Administrativo')->where('id_Condominio',$condomine->id)->where('ano','=',$i)->get()->first();
              $array1[]=$busquedas->ano;
              
             }

            $count1 = count($array1);

            $estado = \SIGRECOFERO\estado::all();
            ?>
            <select id="anoPagoAdmin" name="anoPagoAdmin" class="form-control">
              <option value="">seleccione</option>
              <?php $__currentLoopData = $array1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <option value="<?php echo e($a.'-'.$condomine->id); ?>"><?php echo e($a); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select> 
                    
          </div>
          <?php endif; ?>
        </div>
        

        <div class="form-group" id="anoPagoAdmin1" style="display:none">
            <label>Selecione el Mes o Meses a Pagar: </label>
            <br>
            <?php echo Form::select('Mes[]',[],null,
            ['id'=>'MesAdmin','class'=>'form-control','multiple'=>'true']); ?>

            <h6>Mantenga Presionado la tecla: Crtl o Control, y asi seleccione los meses, dando clic en ellos</h6>
          </div>

          
        <div id="anoPagoParqueo" style="display:none">
            <?php if(!is_null($parqueo)): ?>
            <div class="form-group">      
              <label >En Que Año Va A Pagar: </label>
              <?php
              $date = \Carbon\Carbon::now();
  
              $busqueda = \SIGRECOFERO\estado::where('concepto','=','Parqueo')->where('id_Condominio',$condomine->id)->where('ano','<=',$date->format('Y'))->get()->first();
              $count1 = $busqueda->ano;
              for ($i= $count1; $i <= $date->format('Y') ; $i++) {
                $busquedas = \SIGRECOFERO\estado::where('id_Condominio',$condomine->id)->where('ano','=',$i)->get()->first();
                $array2[]=$busquedas->ano;
               }
  
              $count1 = count($array2);

              ?>
              <select id="anoPagoParqueo" name="anoPagoParqueo" class="form-control" aria-placeholder="Seleccione el año a Pagar...">
                <option value="">seleccione</option>
                <?php $__currentLoopData = $array2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($a.'-'.$condomine->id); ?>"><?php echo e($a); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </select>          
            </div> 
            <?php endif; ?>        
          </div>
         

          <div class="form-group" id="anoPagoParqueo1" style="display:none">
              <label>Selecione el Mes o Meses a Pagar: </label>
              <br>
              <?php echo Form::select('Mes[]',[],null,
              ['id'=>'MesParqueo','class'=>'form-control','multiple'=>'true']); ?>

              <h6>Mantenga Presionado la tecla: Crtl o Control, y asi seleccione los meses, dando clic en ellos</h6>
            </div>
            <!-- /.input group -->
            <!-- /.input group -->
          </div>
        </div>
          </div>
        <!-- /.box-body -->
        <!--/.col (right) -->
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Informacion General</h3>
      </div>
      <!-- /.box-header -->
      <?php
      $emp = SIGRECOFERO\condominio::where('id_Empresa', $condomine->id)->get()->first();
      // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
       ?>

        <div class="box-body">
          <div class="form-group">
            <label>Codigo: </label>
            <?php echo Form::text('codigo',null,['disabled','class'=>'form-control','placeholder'=>'Codigo']); ?>

          </div>
          <div class="form-group">
            <label>Nombre del Condomine: </label>
            <?php echo Form::text('nombre',$emp->empresa->nombre,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado']); ?>

          </div>
          <div class="form-group">
            <label >N° de Local: </label>
            <?php echo Form::text('NLocal',null,['disabled','name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}']); ?>

          </div>
          <div class="form-group">
            <label >Fecha Actual: </label>
            <?php echo Form::date('fechaPago',$date,['disabled','name'=>'fechaPago','id'=>'fechaPago','class'=>'form-control']); ?>

          </div>
          <input type="hidden" name="pagina" value="1">
          <!-- /.form group -->
          </div>
          <!-- /.form group -->
        <!-- /.box-body -->
    </div>
  <center>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Acciones</h3>
        </div>
        <button type="submit" class="btn btn-success">
          SIGUIENTE
        </button>
      
      <a type="submit" class="btn btn-primary" href="<?php echo asset('admin/buscarCondomine'); ?>">Cancelar</a>
      <br>

    </div>
  </center>
</div>
</div>

<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>