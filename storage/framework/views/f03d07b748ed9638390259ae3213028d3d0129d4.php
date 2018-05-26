<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Ver Facturas Emitidas.</li>
 </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Datos del Condomine</h3>
          </div>
          <?php
        $emp = SIGRECOFERO\condominio::where('id_Empresa', $condominio->id)->get()->first();
        // $cont = SIGRECOFERO\empresa::where('id',$condomine->id)->get()->first();
         ?>

          <div class="box-body">
              <div class="form-group">
                  <label>Codigo: </label>
                  <?php echo Form::text('codigo',$condominio->codigo,['disabled','class'=>'form-control','placeholder'=>'Codigo']); ?>

                </div>
            <div class="form-group">
              <label>Nombre del Condomine: </label>
              <?php echo Form::text('nombre',$emp->empresa->nombre,['disabled','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Encargado']); ?>

            </div>
            <div class="form-group">
              <label >Correo Del Condomine: </label>
              <?php echo Form::email('correo',$emp->empresa->correo,['disabled','id'=>'correo','name'=>'correo','class'=>'form-control','placeholder'=>'ejemplo: empresa@ymail.com']); ?>

            </div>
            <!-- /.form group -->
            <div class="form-group">
                <label >N° de Local: </label>
                <?php echo Form::text('NLocal',$condominio->NLocal,['disabled','name'=>'NLocal','id'=>'NLocal','class'=>'form-control','placeholder'=>'X-999','pattern'=>'([A-F]{1})-[0-9]{3}']); ?>

              </div>
        </div>
      </div>
    </div>
      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informacion a Mostrar</h3>
            </div>
                  <?php
                    # code...
                    $estadoAdmin = SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Administrativo')->get()->first();
                    $estadoParqueo = SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Parqueo')->get()->first();
                    $estadoOtros = SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Otros')->get()->first();
                    $estadoAnulada = SIGRECOFERO\facturacion::where('emision','=','Anulado')->get()->first();
                    $estadoAnuladaImprimir = SIGRECOFERO\facturacion::where('emision','=','Anulado He Imprimir')->get()->first();

                    $facturacion = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Administrativo')->where('id_Condominio','=',$condominio->id)->get();
                    $facturacion1 = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Parqueo')->where('id_Condominio','=',$condominio->id)->get();
                    $facturacion2 = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('concepto','=','Otros')->where('id_Condominio','=',$condominio->id)->get();       
                    $facturacion3 = \SIGRECOFERO\facturacion::where('emision','=','Anulado')->orwhere('emision','=','Anulado He Imprimir')->where('id_Condominio','=',$condominio->id)->get();
                    

                    $conteo=1;
                    $conteo1=1;
                    $conteo2=1;
                    $conteo3=1;
                    
                   ?>
              
                    <div class="box-body">
                      <label>Selecione el Concepto Para Ver Su Historial: </label><br>
                      <?php if(!is_null($estadoAdmin)): ?>
                      <?php echo e(Form::radio('radioConcepto','Administrativo',false,['onchange'=>'mostrarTablaA(this.value);'])); ?>

                      <label>Factura en Concepto Administrativa </label> &nbsp;&nbsp;&nbsp;
                      <?php endif; ?>
                      <br>
                      <?php if(!is_null($estadoParqueo)): ?>
                      <?php echo e(Form::radio('radioConcepto','Parqueo',false,['onchange'=>'mostrarTablaA(this.value);'])); ?>

                      <label>Factura en Concepto de Parqueo </label>
                      <?php endif; ?>
                      <br>
                      <?php if(!is_null($estadoOtros)): ?>
                      <?php echo e(Form::radio('radioConcepto','Otros',false,['onchange'=>'mostrarTablaA(this.value);'])); ?>

                      <label>Factura de Otros Concepto </label>
                      <?php endif; ?>
                      <?php if(!is_null($estadoAnulada) || !is_null($estadoAnuladaImprimir)): ?>
                      <?php echo e(Form::radio('radioConcepto','Anulada',false,['onchange'=>'mostrarTablaA(this.value);'])); ?>

                      <label>Facturas Anuladas </label>
                      <?php endif; ?>
                      </div>
          </div>
        </div>
  <div class="col-md-12" id="tablaAdmin" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Facturacion</h3>
      </div>
<div class="table-responsive" >
  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >MES</th>
              <th >AÑO</th>
              <th>ESTADO DE FACTURACION</th>
              <th>CONCEPTO</th>
              <th>ESTADO DE PAGO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $__currentLoopData = $facturacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
              <td><?php echo e($conteo++); ?></td>
              <td><?php echo e($c->mes); ?></td>
              <td><?php echo e($c->ano); ?></td>
              <td align="center"><?php echo e($c->emision); ?></td>
              <td><?php echo e($c->concepto); ?></td>
              <td>
              <?php if($c->estado == 0): ?>
              <span class="label label-warning">DEBE</span>
            <?php endif; ?>
            <?php if($c->estado == 1): ?>
              <span class="label label-info">PAGADO</span>
            <?php endif; ?>
          </td>
              <td width="250px">
                  <?php if($c->emision == 'Emitido'): ?>
                  <a class="btn btn-danger btn-rounded" href="<?php echo e(route('facturacion.show',$c->id.'-'.'1'.'-'.$condominio->id)); ?>">ANULAR FACTURA</a>
                <?php endif; ?>
                <?php if($c->emision == 'No Emitido'): ?>
                <a class="btn btn-info btn-rounded" href="<?php echo e(asset('admin/facturacionIndividual').'/'.$c->id); ?>" target="_blank">EMITIR</a>
                <a class="btn btn-success btn-rounded" href="<?php echo e(route('facturacion.show',$c->id.'-'.'2')); ?>">MODIFICAR</a>
                <?php endif; ?>
                
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>
</div>
</div>

<div class="col-md-12" id="tablaParqueo" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Facturacion</h3>
      </div>
<div class="table-responsive" >
  <table id="examples" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >MES</th>
              <th >AÑO</th>
              <th>ESTADO DE FACTURACION</th>
              <th>CONCEPTO</th>
              <th>ESTADO DE PAGO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $__currentLoopData = $facturacion1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
              <td><?php echo e($conteo1++); ?></td>
              <td><?php echo e($c->mes); ?></td>
              <td><?php echo e($c->ano); ?></td>
              <td align="center"><?php echo e($c->emision); ?></td>
              <td><?php echo e($c->concepto); ?></td>
              <td>
              <?php if($c->estado == 0): ?>
              <span class="label label-warning">DEBE</span>
            <?php endif; ?>
            <?php if($c->estado == 1): ?>
              <span class="label label-info">PAGADO</span>
            <?php endif; ?>
          </td>
            <td width="250px">
                <?php if($c->emision == 'Emitido'): ?>
                <a class="btn btn-danger btn-rounded" href="<?php echo e(route('facturacion.show',$c->id.'-'.'1'.'-'.$condominio->id)); ?>">ANULAR FACTURA</a>
              <?php endif; ?>
              <?php if($c->emision == 'No Emitido'): ?>
              <a class="btn btn-info btn-rounded" href="<?php echo e(asset('admin/facturacionIndividual').'/'.$c->id); ?>" target="_blank">EMITIR</a>
              <a class="btn btn-success btn-rounded" href="<?php echo e(route('facturacion.show',$c->id.'-'.'2')); ?>">MODIFICAR</a>
              <?php endif; ?>
              
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>
</div>
</div>

<div class="col-md-12" id="tablaOtros" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Facturacion</h3>
      </div>
<div class="table-responsive" >
  <table id="examplee" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >MES</th>
              <th >AÑO</th>
              <th>ESTADO DE FACTURACION</th>
              <th>CONCEPTO</th>
              <th>ESTADO DE PAGO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $__currentLoopData = $facturacion2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
              <td><?php echo e($conteo2++); ?></td>
              <td><?php echo e($c->mes); ?></td>
              <td><?php echo e($c->ano); ?></td>
              <td align="center"><?php echo e($c->emision); ?></td>
              <?php 
              $estado = \SIGRECOFERO\estado::find($c->id);
              ?>
              <td><?php echo e($estado->descripcion); ?></td>
              <?php if($c->estado == 0): ?>
              <td><span class="label label-warning">DEBE</span></td>
            <?php endif; ?>
            <?php if($c->estado == 1): ?>
              <td><span class="label label-info">PAGADO</span></td>
            <?php endif; ?>
            <td width="250px">
                <?php if($c->emision == 'Emitido'): ?>
                <a class="btn btn-danger btn-rounded" href="<?php echo e(route('facturacion.show',$c->id.'-'.'1')); ?>">ANULAR FACTURA</a>
              <?php endif; ?>
              <?php if($c->emision == 'No Emitido'): ?>
              <a class="btn btn-info btn-rounded" href="<?php echo e(asset('admin/facturacionIndividual').'/'.$c->id); ?>" target="_blank">EMITIR</a>
              <a class="btn btn-success btn-rounded" href="<?php echo e(route('facturacion.show',$c->id.'-'.'2')); ?>">MODIFICAR</a>
              <?php endif; ?>
              
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>
</div>
</div>

<div class="col-md-12" id="tablaAnulada">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Facturacion</h3>
      </div>
<div class="table-responsive" >
  <table id="exampli" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
          <tr>
              <th width="50px">N°</th>
              <th >MES</th>
              <th >AÑO</th>
              <th>ESTADO DE FACTURACION</th>
              <th>CONCEPTO</th>
              <th>RAZON DE ANULACION</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody class="busqueda">
        <?php $__currentLoopData = $facturacion3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php $permiso = explode('-',$f->permiso); ?>
          <tr>
              <td><?php echo e($conteo3++); ?></td>
              <td><?php echo e($f->mes); ?></td>
              <td><?php echo e($f->ano); ?></td>
              <td><?php echo e($f->emision); ?></td>
              <td><?php echo e($f->concepto); ?></td>
              <?php $razon= \SIGRECOFERO\factura_anulada::find($permiso[1]);
               ?>
              <td><?php echo e($razon->descripcion); ?></td>
              <td width="250px">
                <?php if($permiso[0] == 2): ?>
                <span class="label label-info">FACTURA ANULADA</span>
                <br>
                <span class="label label-info">Y NO PODRA IMPRIMIRSE</span>
                <?php endif; ?>
                <?php if($permiso[0] == 1): ?>
                <?php 
                $Per = \SIGRECOFERO\User::find($permiso[2]);
                ?>
                <span class="label label-success"><?php echo e($Per->cargo); ?> A DADO PERMISO</span>
                <?php if(Auth::User()->cargo == 'Programador' || Auth::User()->cargo == 'Administracion'): ?>
                <a class="btn btn-success btn-rounded" href="<?php echo e(route('facturacion.show',$f->id.'-'.'2')); ?>">MODIFICAR</a>
                <?php endif; ?>
                <?php if(Auth::User()->cargo == 'Programador' || Auth::User()->cargo == 'Financiero'): ?>
                <a class="btn btn-info btn-rounded" href="<?php echo e(asset('admin/facturacionIndividual').'/'.$f->id); ?>" onclick="javascript:window.location.reload();" target="_blank">EMITIR</a>
                <?php endif; ?>
                <?php endif; ?>

                <?php if($permiso[0] == 0): ?>
                <?php 
                $Per = \SIGRECOFERO\User::find($permiso[2]);
                ?>
                <span class="label label-warning"><?php echo e($Per->cargo); ?></span>
                <br>
                <span class="label label-warning">A SOLICITADO PERMISO</span>
                <?php if(Auth::User()->cargo == 'Administracion' || Auth::User()->cargo == 'Programador'): ?>
                <a class="btn btn-success btn-rounded" href="<?php echo e(route('facturacion.show',$f->id.'-'.'2')); ?>">MODIFICAR</a>
                <?php endif; ?>
                <?php endif; ?>

              </td>

          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>
  </table>
</div>
</div>
</div>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>