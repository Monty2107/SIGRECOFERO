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
        <h4>Lista de movimientos efectuados de pago Diario</h4>
        <div class="input-group bootstrap-touchspin">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a type="button" href="<?php echo asset('admin/pagoReporte'); ?>" class="btn btn-success responsive">Ver Reportes</a>
            </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered display" cellspacing="100" width="100%" >
            <thead>
              <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Concepto</th>
                <th>Forma de Pago</th>
                <th>condominio</th>
                <th>Cantidad</th>
            
              </tr>
            </thead>
            <tbody>
                <?php $n =1; 
                ?>
<?php foreach($ingreso_diario as $ingreso): ?>
<?php   
$dato = explode(" ",(String)$ingreso->created_at);
$fecha = $dato[0];
$hora = $dato[1];
$datoFecha = explode("-",(String)$fecha);
$fechaOrdenada = $datoFecha[2]."-".$datoFecha[1]."-".$datoFecha[0];
$condominio = \SIGRECOFERO\condominio::find($ingreso->id_Condominio);

?>
<tr>
    <td align="rihgt" style = "width:15%"><font size="4" ></font><?php echo e($n++); ?></td>
  <td align="rihgt" style = "width:15%"><font size="4" ></font><?php echo e($fechaOrdenada); ?></td>
  <td align="rihgt" style = "width:10%"><font size="4" ></font><?php echo e($ingreso->concepto); ?></td>
  <td align="rihgt" style = "width:20%"><font size="4" ></font><?php echo e($ingreso->formaPago); ?></td>
  <td align="rihgt" style = "width:30%"><font size="4" ></font><?php echo e($condominio->empresa->nombre); ?></td>
  <td align="rihgt" style = "width:20%"><font size="4" ></font><?php echo e($ingreso->cantidad); ?></td>
</tr>
<?php 
endforeach 
?>
                    </tbody>
            <tfoot>
            <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Forma de Pago</th>
                    <th>condominio</th>
                    <th>Cantidad</th>
                    
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