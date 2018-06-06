<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Historial De Pagos Mensuales y Anuales</li>
 </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php echo Form::model($condomine,['route' => ['condominio.update',$condomine->id], 'method' => 'PUT','id'=>'form']); ?>

  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Informacion General</h3>
        </div>
        <?php
        $emp = SIGRECOFERO\condominio::where('id_Empresa', $condomine->id)->get()->first();
        // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
        $estado1 = SIGRECOFERO\estado::where('id_Condominio','=',$condomine->id)->where('estado',0)->get();
        $count2 = count($estado1);
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
          # code...
          $estadoAdmin = SIGRECOFERO\estado::where('concepto','=','Administrativo')->where('id_Condominio','=',$condomine->id)->orderBy('ano','desc')->get();
          $estadoParqueo = SIGRECOFERO\estado::where('concepto','=','Parqueo')->where('id_Condominio','=',$condomine->id)->orderBy('ano','desc')->get();
          $estadoOtros = SIGRECOFERO\estado::where('concepto','=','Otros')->where('id_Condominio','=',$condomine->id)->orderBy('ano','desc')->get();
        $conteo=1;
        $conteo1=1;
        $conteo2=1;
        // dd($estadoParqueo);
         ?>
          <div class="box-body">
            <div class="form-group">
              <label>Nombre del Condomine: </label>
              <?php echo Form::text('nombre',$emp->empresa->nombre,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado del Condomine']); ?>

            </div>
            <label>Selecione el Concepto Para Ver Su Historial: </label><br>
            <?php if(!$estadoAdmin->isEmpty()): ?>
            <?php echo e(Form::radio('radioConcepto','Administrativo',false,['onchange'=>'mostrarTabla(this.value);'])); ?>

            <label>Historial en Cuotas Administrativa </label> &nbsp;&nbsp;&nbsp;
            <?php endif; ?>

            <?php if(!$estadoParqueo->isEmpty()): ?>
            <?php echo e(Form::radio('radioConcepto','Parqueo',false,['onchange'=>'mostrarTabla(this.value);'])); ?>

            <label>Historial en Cuotas de Parqueo </label>
            <?php endif; ?>

            <?php if(!$estadoOtros->isEmpty()): ?>
            <?php echo e(Form::radio('radioConcepto','Otros',false,['onchange'=>'mostrarTabla(this.value);'])); ?>

            <label>Historial de Otras Cuotas </label>
            <?php endif; ?>
            </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Informacion General</h3>
        </div>
          <div class="box-body">
            <div class="form-group">
              <label>N° De Local:  </label>
              <?php echo Form::text('NLocal',$condomine->Nlocal,['disabled','name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'Nombre del Encargado del Condomine']); ?>

            </div>
            </div>
      </div>
    </div>

  </div>

  <div class="table-responsive" id="tablaOtros" style="display:none;">
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CONCEPTO</th>
              <th >DESCRIPCION</th>
              <th>ESTADO</th>
              <th>MES</th>
              <th>AÑO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $__currentLoopData = $estadoOtros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
            <td><?php echo e($conteo++); ?></td>
            <td><?php echo e($cb->concepto); ?></td>
            <td><?php echo e($cb->descripcion); ?></td>
            <?php if($cb->estado == 0): ?>
              <td><span class="label label-warning">DEBE</span></td>
            <?php endif; ?>
            <?php if($cb->estado == 1): ?>
              <td><span class="label label-info">PAGADO</span></td>
            <?php endif; ?>
            <td><?php echo e($cb->mes); ?></td>
            <td><?php echo e($cb->ano); ?></td>
            <?php if($cb->estado == 0): ?>
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="<?php echo e(route('pagoMes.edit',$cb->id)); ?>">IR A PAGAR</a>
              </td>
            <?php endif; ?>
            <?php if($cb->estado == 1): ?>
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="<?php echo e(route('facturacion.show',$condomine->id.'-'.'0')); ?>">VER FACTURACION</a>
              </td>
            <?php endif; ?>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
  </div>

  <div class="table-responsive" id="tablaAdmin" style="display:none;">
  <table id="examples" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >CONCEPTO</th>
              <th>ESTADO</th>
              <th>MES</th>
              <th>AÑO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $__currentLoopData = $estadoAdmin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
            <td><?php echo e($conteo1++); ?></td>
            <td><?php echo e($cb->concepto); ?></td>
            <?php if($cb->estado == 0): ?>
              <td><span class="label label-warning">DEBE</span></td>
            <?php endif; ?>
            <?php if($cb->estado == 1): ?>
              <td><span class="label label-info">PAGADO</span></td>
            <?php endif; ?>
            <td><?php echo e($cb->mes); ?></td>
            <td><?php echo e($cb->ano); ?></td>
            <?php if($cb->estado == 0): ?>
              <td width="250px">
                <a class="btn btn-success btn-rounded" href="<?php echo e(route('pagoMes.edit',$cb->id)); ?>">IR A PAGAR</a>
              </td>
            <?php endif; ?>
            <?php if($cb->estado == 1): ?>
              <td width="250px">
                <a class="btn btn-info btn-rounded" href="<?php echo e(route('facturacion.show',$condomine->id.'-'.'0')); ?>">VER FACTURACION</a>
              </td>
            <?php endif; ?>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>

<div class="table-responsive" id="tablaParqueo" style="display:none;">
<table id="examplee" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
    <thead>
        <tr>
            <th width="50px">N°</th>
            <th >CONCEPTO</th>
            <th>ESTADO</th>
            <th>MES</th>
            <th>AÑO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="busqueda">
      <?php $__currentLoopData = $estadoParqueo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
          <td><?php echo e($conteo2++); ?></td>
          <td><?php echo e($cb->concepto); ?></td>
          <?php if($cb->estado == 0): ?>
            <td><span class="label label-warning">DEBE</span></td>
          <?php endif; ?>
          <?php if($cb->estado == 1): ?>
            <td><span class="label label-info">PAGADO</span></td>
          <?php endif; ?>
          <td><?php echo e($cb->mes); ?></td>
          <td><?php echo e($cb->ano); ?></td>
          <?php if($cb->estado == 0): ?>
            <td width="250px">
              <a class="btn btn-success btn-rounded" href="<?php echo e(route('pagoMes.edit',$cb->id)); ?>">IR A PAGAR</a>
            </td>
          <?php endif; ?>
          <?php if($cb->estado == 1): ?>
            <td width="250px">
              <a class="btn btn-info btn-rounded" href="<?php echo e(route('facturacion.show',$condomine->id.'-'.'0')); ?>">VER FACTURACION</a>
            </td>
          <?php endif; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>
</div>

<?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>