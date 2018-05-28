<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Saldos Antiguos</title>
  <style>
      .blanco-verdoso {
  color: #FFFFFF;
  background-color:#1890a2;
  
}
  footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
body {
    font-family: 'Source Sans Pro', sans-serif;
    font-weight: 300;
    font-size: 12px;
    margin: 0;
    padding: 0;
    color: #777777;
  }
table {
    border-collapse: collapse;
    width: 100%;
}


table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 10px;
  color: white;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;
  font-weight: normal;
}

th {
    background-color: #1890a2;
    color: white;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #FAFBFB;
}
  section .table-wrapper {
    position: relative;
    overflow: hidden;
  }

/*tr:nth-child(even){background-color: #F0FDFF}
*/
table tr:nth-child(2n-1) td {
  background: #F5F5F;
}
</style>
</head>
<body>

  <div class="col-md-12">
    <div class="box-body">
      <div class="box-header with-border">
        <HR style="position: absolute;left: 270px; top: 30px; z-index: 1; color:black;" width=50%>
        <div style="position: absolute;left: 440px; top: 20px; z-index: 1; color:#1890a2; font-family: fantasy; font-weight: bold;"><h2>Condominios Feria Rosa</h2></div>
        <HR style="position: absolute;left: 270px; top: 50px; z-index: 1; color:black;" width=50%>
        <div style="position: absolute;left: 450px; top: 80px; z-index: 1; font-style: italic; font-weight: bold;">Alameda Manuel Enrique Araujo  </div>
        <div style="position: absolute;left: 400px; top: 90px; z-index: 1;"><h4>Condominio Feria Rosa Local B-133 San Salvador.</h4></div>
        <div style="position: absolute;left: 475px; top: 110px; z-index: 1;"><h4>Telefono: 2243-3705 </h4></div>
        



        <HR style="position: absolute;left: 23px; top: 135px; z-index: 1; color:black;" width=100%>
            <?php   
            $carbon = new \Carbon\Carbon();
            $dates = $carbon->now();
            ?>
        <div style="position: absolute;left: 900px; top: 145px; z-index: 1;">Fecha:  <?php echo e($dates->format('d-m-Y')); ?> </div>
        <h3 align="right" style="position: absolute;left:40; top:10px; px; z-index: 1;"><img class="al img-responsive" alt="image" width="110px" height="110px" src="img/gano4.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
          <?php 
          $fechaIordenada = explode('-',$fechaInicio);
          $fechaFordenada = explode('-',$fechaFinal);
          $n =1;
          $sum1 = 0;
          $sum2 = 0;
          $sum3 = 0;
          $sum4 = 0;
          $sum5 = 0;
            ?>
      <div style="position: absolute;left: 450px; top: 160px; z-index: 1;"><h3>BALANCE DETALLADO DE</h3></div>
      <div style="position: absolute;left: 350px; top: 180px; z-index: 1;"><h3>SALDOS ANTIGUOS DE: <?php echo e($fechaIordenada[2].' - ' .$fechaIordenada[1].' - '.
    $fechaIordenada[0].' '); ?> AL: <?php echo e($fechaFordenada[2].' - ' .$fechaFordenada[1].' - '.$fechaFordenada[0]); ?></h3></div>

<?php 
                    $count = count($arrayCondominio);
                    for ($i=0; $i < $count ; $i++) { 
                        # code...
                        $condominio = \SIGRECOFERO\condominio::find($arrayCondominio[$i]);
                        
                    ?>
                    <div>
                        <span> NOMBRE DEL CONDOMINE:   </span>
                    <span> <?php echo e($condominio->empresa->nombre); ?> </span>
                    </div>

        <table class="table-wrapper" >
            
           <thead>
            <tr>
              <th style="color: white; font-weight: bold;">N°</th> 
              <th style="color: white; font-weight: bold;">Fecha de Faturacion</th>
              <th style="color: white; font-weight: bold;">Concepto</th>
              <th style="color: white; font-weight: bold;">Cantidad</th>
              <th style="color: white; font-weight: bold;">1 a 30 Dias</th>
              <th style="color: white; font-weight: bold;">31 a 60 Dias</th>
              <th style="color: white; font-weight: bold;">60 a 90 Dias</th>
              <th style="color: white; font-weight: bold;">91 a 120 Dias</th>
              <th style="color: white; font-weight: bold;">120 a Mas Dias</th>
            </tr>
          </thead>
        <tbody>
            
          <?php 
          $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $val1 = ($fechaIordenada[1] - 1) +1;
        $val2 = ($fechaFordenada[1] - 1) +1;
        $concaF = $fechaFordenada[1].$fechaFordenada[2];
        $concaI = $fechaIordenada[1].$fechaIordenada[2];
        $factura = \SIGRECOFERO\facturacion::where('estado','=','0')->where('id_Condominio','=',$condominio->id)->where('emision','=','Emitido')->get();
        $count1 = count($factura);
        $nu = 2;
        $total = 0;
          for ($j=0; $j < $count1 ; $j++) { 
          $fecha = \SIGRECOFERO\fecha::find($factura[$j]->id_Fecha);
          $concaval = $fecha->mes.$fecha->dia;
          
          ?>

          <?php if($concaval >= $concaI && $concaval <= $concaF): ?>
          <?php $total = $factura[$j]->cantidad + $total; ?>
          <tr>
                <td style = "width:10%"><?php echo e($nu++); ?></td>
                <td style = "width:10%"><?php echo e($fecha->dia.' - '.$fecha->mes.' - '.$fecha->ano); ?> </td>
                <td style = "width:10%"><?php echo e($factura[$j]->concepto); ?></td>
                <td style = "width:10%">$ <?php echo e($factura[$j]->cantidad); ?></td>
                <?php 
                $val30 = ($fechaFordenada[1] - 1) + 1;
                $valF30 = $val30.$fechaFordenada[2];
                $d1 = ($fecha->mes - 1) + 1;
                $d30 = $d1.$fecha->dia;
                $t1 = $valF30 - $d30;
                $total1 = 0;
                ?>
                <?php if($t1 >= 100 && $t1 < 200): ?>
                <?php 
                $total1 = $factura[$j]->cantidad;
                $sum1 = $sum1 + $total1;
                ?>
                <td style = "width:10%">$ <?php echo e($total1); ?></td>
                <?php else: ?>
                <td style = "width:10%"> $ 0</td>
                <?php endif; ?>
                <?php 
                $val31 = ($fechaFordenada[1] - 2) + 1;
                $valF31 = $val31.$fechaFordenada[2];
                $d2 = ($fecha->mes - 2)+1;
                $d31 = $d2.$fecha->dia;
                $t2 = $valF31 - $d31;
                $total2 = 0;
                ?>
                <?php if($t1 >= 200 && $t1 < 300): ?>
                <?php 
                $total2 =$factura[$j]->cantidad;
                $sum2 = $sum2 + $total2;
                ?>
                <td style = "width:10%">$ <?php echo e($total2); ?></td>  
                <?php else: ?>
                <td style = "width:10%"> $ 0</td>
                <?php endif; ?>

                <?php 
                $val60 = ($fechaFordenada[1] - 3) + 1;
                $valF60 = $val60.$fechaFordenada[2];
                $d3 = ($fecha->mes - 3)+1;
                $d60 = $d3.$fecha->dia;
                $t3 = $valF60 - $d60;
                $total3 = 0;
                ?>
                <?php if($t1 >= 300 && $t1 < 400): ?>
                <?php 
                $total3 = $factura[$j]->cantidad;
                $sum3 = $sum3 + $total3;
                ?>
                <td style = "width:10%">$ <?php echo e($total3); ?></td>
                <?php else: ?>
                <td style = "width:10%"> $ 0</td>
                <?php endif; ?>
                <?php 
                $val91 = ($fechaFordenada[1] - 4) + 1;
                $valF91 = $val91.$fechaFordenada[2];
                $d4 = ($fecha->mes - 4)+1;
                $d91 = $d4.$fecha->dia;
                $t4 = $valF91 - $d91;
                $total4 = 0;
                ?>
                <?php if($t1 >= 400 && $t1 < 500): ?>
                <?php 
                $total4 =$factura[$j]->cantidad;
                $sum4 = $sum4 + $total4;
                ?>
                <td style = "width:10%">$ <?php echo e($total4); ?></td>
                <?php else: ?>
                <td style = "width:10%"> $ 0</td>
                <?php endif; ?>
                <?php 
                $val120 = ($fechaFordenada[1] - 5) + 1;
                $valF120 = $val120.$fechaFordenada[2];
                $d5 = ($fecha->mes - 5)+1;
                $d120 = $d5.$fecha->dia;
                $t5 = $valF120 - $d120;
                $total5 = 0;
                ?>
                <?php if($t1 >= 500): ?>
                <?php 
                $total5 =$factura[$j]->cantidad;
                $sum5 = $sum5 + $total5;
                ?>
                <td style = "width:10%">$ <?php echo e($total5); ?></td>
                <?php else: ?>
                <td style = "width:10%"> $ 0</td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>
            
          <?php } ?>

          <?php 
            $deudas = \SIGRECOFERO\saldo::where('id_Condominio','=',$condominio->id)->where('estado','=','Deudas')->sum('cantidad');
            $pagos = \SIGRECOFERO\saldo::where('id_Condominio','=',$condominio->id)->where('estado','=','Pagos')->sum('cantidad');
            $antiguo = \SIGRECOFERO\saldo::where('id_Condominio','=',$condominio->id)->where('estado','=','Antiguo')->sum('cantidad');
            $sum = ($antiguo + $deudas) - $pagos;
                ?>
            <tr>
                    <td style = "width:10%"><?php echo e($nu); ?></td>
                    <td style = "width:10%"> -- </td>
                    <td style = "width:10%"> Saldo Antiguo </td>
                    <td style = "width:10%"> </td>
                    <td style = "width:10%"> </td>
                    <td style = "width:10%"> </td>
                    <td style = "width:10%"> </td>
                    <td style = "width:10%"> </td>
                    <td style = "width:10%">$ <?php echo e($antiguo); ?></td>
            </tr>
            <tr>
                    <td style = "width:10%"> </td>
                    <td style = "width:10%"> </td>
                    <td style = "width:10%"> </td>
                    <td style = "width:10%">TOTALES GENERALES: </td>
                    <td style = "width:10%">$ <?php echo e($sum1); ?></td>
                    <td style = "width:10%">$ <?php echo e($sum2); ?></td>
                    <td style = "width:10%">$ <?php echo e($sum3); ?></td>
                    <td style = "width:10%">$ <?php echo e($sum4); ?></td>
                    <td style = "width:10%">$ <?php echo e($sum5+$antiguo); ?></td>
            </tr>
            <tr>
              <td style = "width:10%"> </td>
              <td style = "width:10%"> </td>
              <td style = "width:10%">SUMA DE</td>
              <td style = "width:10%">TOTALES:</td>
              <td style = "width:10%">$ <?php echo e($sum1 + $sum2 + $sum3 + $sum4 + $sum5+$antiguo); ?></td>
              <td style = "width:10%"> </td>
              <td style = "width:10%"> </td>
              <td style = "width:10%"> </td>
              <td style = "width:10%"> </td>
      </tr>
           
        </tbody>
      </table>
      <br><br>
      <?php
      }
      ?>
      <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              Condominios Feria Rosa
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>
     </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</body>
</html>
