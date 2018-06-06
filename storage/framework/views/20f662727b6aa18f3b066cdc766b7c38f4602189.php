<?php $__env->startSection('posicion'); ?>
  <h1>
   Dashboard
   <small>Panel de Control</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="<?php echo asset('/'); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Bitacora.</li>
 </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title responsive">
        <h5>Lista de movimientos efectuados en el sistema</h5>
        <div class="input-group bootstrap-touchspin">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a type="button" href="ReporteBitacoras/1" target="_blank" class="btn btn-success responsive">Generar Reporte</a>
            </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered display" cellspacing="100" width="100%">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acción</th>
                <th>Descripción</th>
                <th>Usuario</th>
                <th>Cargo</th>
              </tr>
            </thead>
            <tbody>
<?php foreach($bitas as $bita): ?>
<tr>
  <?php   
  $dato = explode(" ",(String)$bita->created_at);
  $fecha = $dato[0];
  $hora = $dato[1];
  $datoFecha = explode("-",(String)$fecha);
  $fechaOrdenada = $datoFecha[2]."/".$datoFecha[1]."/".$datoFecha[0];
  $usu = \SIGRECOFERO\User::find($bita->id_Usuario);


  ?>
  <td align="rihgt" style = "width:15%"><font size="4" ></font><?php echo e($fechaOrdenada); ?></td>
  <td align="rihgt" style = "width:10%"><font size="4" ></font><?php echo e($hora); ?></td>
  <td align="rihgt" style = "width:20%"><font size="4" ></font><?php echo e($bita->accion_Bit); ?></td>
  <td align="rihgt" style = "width:30%"><font size="4" ></font><?php echo e($bita->comentario_Bit); ?></td>
  <td align="rihgt" style = "width:20%"><font size="4" ></font><?php echo e($usu->name); ?></td>
  <td align="rihgt" style = "width:20%"><font size="4" ></font><?php echo e($usu->cargo); ?></td>
</tr>
<?php endforeach ?>
                    </tbody>
            <tfoot>
            <tr>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Acción</th>
              <th>Descripción</th>
              <th>Usuario</th>
              <th>Cargo</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>