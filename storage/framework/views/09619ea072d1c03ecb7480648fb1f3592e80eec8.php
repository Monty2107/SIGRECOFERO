 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cuentas Por Cobrar</title>
  <style>
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
    width: 95%;
}


table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
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
        <HR style="position: absolute;left: 20px; top: 30px; z-index: 1; color:black;" width=100%>
            <div style="position: absolute;left: 550px; top: 40px; z-index: 1;">Fecha:   </div>
            <?php $carbon = new \Carbon\Carbon();
            $date = $carbon->now();?>
        <div style="position: absolute;left: 600px; top: 40px; z-index: 1;"><?php echo e($date->format('d-m-Y')); ?></div>
        <div style="position: absolute;left: 200px; top: 20px; z-index: 1; color:#1890a2; font-family: fantasy; font-weight: bold;"><h2>CONDOMINIO DE FERIA ROSA</h2></div>
        <div style="position: absolute;left: 240px; top: 40px; z-index: 1; color:#1890a2; font-family: fantasy; font-weight: bold;"><h2>PARTIDAS DE DIARIO</h2></div>
        <HR style="position: absolute;left: 20px; top: 70px; z-index: 1; color:black;" width=100%>
        <div style="position: absolute;left: 20px; top: 90px; z-index: 1;">Numero de Partida</div>
        <div style="position: absolute;left: 180px; top: 90px; z-index: 1;">1</div>
        <div style="position: absolute;left: 20px; top: 115px; z-index: 1;">Fecha de Partida</div>
        <?php $fecha = \SIGRECOFERO\fecha::find($cuenta->id_Fecha)?>
        <div style="position: absolute;left: 180px; top: 115px; z-index: 1;"><?php echo e($fecha->dia.' - '.$fecha->mes.' - '.$fecha->ano); ?></div>
        <div style="position: absolute;left: 20px; top: 135px; z-index: 1;">Tipo de Partida</div>
        <div style="position: absolute;left: 180px; top: 135px; z-index: 1;">DIARIO</div>
        <div style="position: absolute;left: 20px; top: 155px; z-index: 1;">Concepto General</div>
        <div style="position: absolute;left: 180px; top: 155px; z-index: 1; text-transform: uppercase;">REGISTRO DE CUENTAS POR COBRAR DE LOS CONDOMINES <?php echo e(' '.$cuenta->mes.' '.$cuenta->ano); ?></div>
        <HR style="position: absolute;left: 20px; top: 170px; z-index: 1; color:black;" width=100%>
            <div style="position: absolute;left: 20px; top: 180px; z-index: 1; font-weight: bold;">CUENTA CONTABLE</div>
            <div style="position: absolute;left: 280px; top: 180px; z-index: 1; font-weight: bold;">CONCEPTO</div>
            <div style="position: absolute;left: 505px; top: 180px; z-index: 1; font-weight: bold;">PARCIAL</div>
            <div style="position: absolute;left: 580px; top: 180px; z-index: 1; font-weight: bold;">CARGOS</div>
            <div style="position: absolute;left: 645px; top: 180px; z-index: 1; font-weight: bold;">ABONOS</div>
            <HR style="position: absolute;left: 20px; top: 190px; z-index: 1; color:black;" width=100%>
                <?php 
                $condominio1 = \SIGRECOFERO\condominio::all();
             $n = 1;
             $j=1;
             $sum = 0;
             $sum1 = 0;
             ?>
             <?php $__currentLoopData = $condominio1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
             <?php
             if($cuenta->concepto == 'Todas'){
               $factu = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }else{
              $factu = \SIGRECOFERO\facturacion::where('concepto','=',$cuenta->concepto)->where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }
               $count1 = count($factu);
               
               for ($i=0; $i < $count1 ; $i++) { 
                   # code...
                   if ($factu[$i]->concepto == 'Administrativo') {
                       $vali = $factu[$i]->cantidad;
                       $sum = $vali + $sum;
                   }else {
                       $vali = $factu[$i]->cantidad;
                       $sum1 = $vali + $sum1;
                   }
               }       
               ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <div style="position: absolute;left: 20px; top: 210px; z-index: 1; font-weight: bold;">1102  CUENTAS Y DOCUMENTOS POR</div>
            <div style="position: absolute;left: 600px; top: 210px; z-index: 1; font-weight: bold;"><?php echo e($sum + $sum1); ?> </div>
            <div style="position: absolute;left: 20px; top: 230px; z-index: 1; font-size:7.5;">11020114 CUOTAS ADMINISTRACION</div>
            <div style="position: absolute;left: 280px; top: 230px; z-index: 1; font-size:7.5;">REGISTRO DE CUENTAS POR COBRAR <br> DE LOS CONDOMINES<?php echo e(' '.$cuenta->mes.' '.$cuenta->ano); ?></div>
           
            <div style="position: absolute;left: 525px; top: 230px; z-index: 1; font-size:7.5;"><?php echo e($sum); ?></div>
            <div style="position: absolute;left: 20px; top: 270px; z-index: 1; font-size:7.5;">11020115 CUOTAS PARQUEO</div>
            <div style="position: absolute;left: 280px; top: 270px; z-index: 1; font-size:7.5;">REGISTRO DE CUENTAS POR COBRAR <br> DE LOS CONDOMINES<?php echo e(' '.$cuenta->mes.' '.$cuenta->ano); ?></div>
            <div style="position: absolute;left: 525px; top: 270px; z-index: 1; font-size:7.5;"><?php echo e($sum1); ?></div>
            <HR style="position: absolute;left: 20px; top: 290px; z-index: 1; color:black;" width=100%>

                <div style="position: absolute;left: 20px; top: 310px; z-index: 1; font-weight: bold;">2204  INGRESOS COBRADOS POR</div>
            <div style="position: absolute;left: 655px; top: 310px; z-index: 1; font-weight: bold;"><?php echo e($sum + $sum1); ?> </div>
            <div style="position: absolute;left: 20px; top: 330px; z-index: 1; font-size:6;">22040104 INGRESOS DIFERIDOS CUOTAS DE ADMINISTRACION</div>
            <div style="position: absolute;left: 280px; top: 330px; z-index: 1; font-size:7.5;">REGISTRO DE CUENTAS POR COBRAR <br> DE LOS CONDOMINES<?php echo e(' '.$cuenta->mes.' '.$cuenta->ano); ?></div>
           
            <div style="position: absolute;left: 525px; top: 330px; z-index: 1; font-size:7.5;"><?php echo e($sum); ?></div>
            <div style="position: absolute;left: 20px; top: 370px; z-index: 1; font-size:7.5;">11020115 INGRESOS DIFERIDOS PARQUEO</div>
            <div style="position: absolute;left: 280px; top: 370px; z-index: 1; font-size:7.5;">REGISTRO DE CUENTAS POR COBRAR <br> DE LOS CONDOMINES<?php echo e(' '.$cuenta->mes.' '.$cuenta->ano); ?></div>
            <div style="position: absolute;left: 525px; top: 370px; z-index: 1; font-size:7.5;"><?php echo e($sum1); ?></div>
            <HR style="position: absolute;left: 580px; top: 390px; z-index: 1; color:black;" width=18%>
                <div style="position: absolute;left: 600px; top: 400px; z-index: 1; font-weight: bold;"><?php echo e($sum + $sum1); ?> </div>
                <div style="position: absolute;left: 655px; top: 400px; z-index: 1; font-weight: bold;"><?php echo e($sum + $sum1); ?> </div>
            <div style="position: absolute;left: 400px; top: 400px; z-index: 1; font-size:7.5;">TOTAL DE CARGOS Y ABONOS</div>
    

        
<!-- <img alt="image" class="img-responsive" src="../img/Mada-Denim-Blanco4.jpg"> -->
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br>
        
        
      </div><!-- /.box-header -->
    </body>
    <body>
      <div class="box-body">
        <div style="position: absolute;left: 270px;  z-index: 1;"><h3>SEGREGACION POR CLIENTE</h3></div>
        <br><br><br>
        <div style="position: absolute;left: 20px;  z-index: 1;"><h3>1102  CUENTAS Y DOCUMENTOS POR</h3></div>
        <br><br>
        <div style="position: absolute;left: 50px;  z-index: 1;">11020114 CUOTAS ADMINISTRACION</div>
        <br><br><br><br>
        <table class="table-wrapper" >  
           <thead>
            <tr>
              <th style="color: white; font-weight: bold;">N°</th> 
              <th style="color: white; font-weight: bold;">Codigo</th>
              <th style="color: white; font-weight: bold;">Cliente</th>
              <th style="color: white; font-weight: bold;">Concepto</th>
              <th style="color: white; font-weight: bold;">Debe</th>
              <th style="color: white; font-weight: bold;">Haber</th>
              <th style="color: white; font-weight: bold;">Saldo</th>
            </tr>
          </thead>
          <?php 
          $condominio = \SIGRECOFERO\condominio::all();
          $n = 1;
          $j=1;
          $sum = 0;
          $tip = 400;
              ?>
      <?php $__currentLoopData = $condominio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $co): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tbody>
               
            <?php 
            if($cuenta->concepto == 'Todas'){
               $factura = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }else{
              $factura = \SIGRECOFERO\facturacion::where('concepto','=',$cuenta->concepto)->where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }
            $count = count($factura);
            
            for ($i=0; $i < $count ; $i++) { 
                # code...       
            ?>
            <?php if($factura[$i]->concepto == 'Administrativo'): ?>
            <?php 
            $val = $factura[$i]->cantidad;
            $sum = $val * $j;
            $j++;
            $top= $tip + 50;
            if($top >  1024){
                $top = 70;
                $tip = 30;
            }else{
                $top = $top + 100;
            }
            ?>
            <tr>          
            <td style = "width:10%"><?php echo e($n++); ?></td> 
            <td style = "width:10%"><?php echo e($co->codigo); ?></td>
            <td style = "width:30%"><?php echo e($co->empresa->nombre); ?></td>
            <td style = "width:30%"><?php echo e('Cuota '.$factura[$i]->concepto); ?></td>
              <td style = "width:10%"><?php echo e($factura[$i]->cantidad); ?> </td>
              <td style = "width:10%"> </td>
              <td style = "width:10%"><?php echo e($sum); ?></td>  
            </tr>
            <?php endif; ?>
            <?php             } ?>
           
        </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        
      </table>
      <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              Condominio Feria Rosas.
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
    
    <div>
      <div style="position: absolute;left: 50px; z-index: 1;">11020115  CUOTAS PARQUEO</div>
      </div>
    <br><br>
    <div class="box-body">
            <table class="table-wrapper" >  
               <thead>
                <tr>
                  <th style="color: white; font-weight: bold;">N°</th> 
                  <th style="color: white; font-weight: bold;">Codigo</th>
                  <th style="color: white; font-weight: bold;">Cliente</th>
                  <th style="color: white; font-weight: bold;">Concepto</th>
                  <th style="color: white; font-weight: bold;">Debe</th>
                  <th style="color: white; font-weight: bold;">Haber</th>
                  <th style="color: white; font-weight: bold;">Saldo</th>
                </tr>
              </thead>    
              <?php 
              $condominio = \SIGRECOFERO\condominio::all();
              $n = 1;
              $j=1;
                  ?>
            <?php $__currentLoopData = $condominio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $co): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tbody>
                 
              <?php 
              if($cuenta->concepto == 'Todas'){
               $factu = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }else{
              $factu = \SIGRECOFERO\facturacion::where('concepto','=',$cuenta->concepto)->where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }
              $count = count($factura);
              
              for ($i=0; $i < $count ; $i++) { 
                  # code...       
              ?>
              <?php if($factura[$i]->concepto == 'Parqueo'): ?>
              <?php 
              $val = $factura[$i]->cantidad;
              $sum = $val + $sum;
              $j++;
              $tup = $top + 80;
              if ($tup >= 1024) {
                  $top = 30;
                  $tup = 70;
              }else{
                  $tup = $tup + 30;
              }
              ?>
              
              <tr> 
                        
              <td style = "width:10%"><?php echo e($n++); ?></td> 
              <td style = "width:10%"><?php echo e($co->codigo); ?></td>
              <td style = "width:30%"><?php echo e($co->empresa->nombre); ?></td>
              <td style = "width:30%"><?php echo e('Cuota de '.$factura[$i]->concepto); ?></td>
                <td style = "width:10%"><?php echo e($factura[$i]->cantidad); ?></td>
                <td style = "width:10%"> </td>
                <td style = "width:10%"><?php echo e($sum); ?></td>  
              </tr>
              <?php endif; ?>
              <?php             } ?>
             
          </tbody>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <div>
        
          </table>
          <footer>
        <table>
          <tr>
            <td>
                <p class="izq">
                  Condominio Feria Rosas.
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
         <div style="position: absolute;left: 20px; z-index: 1;"><h3>2204  INGRESOS COBRADOS POR</h3></div><br><br>
            <div style="position: absolute;left: 50px;  z-index: 1;">22040104 INGRESOS DIFERIDOS CUOTAS DE ADMINISTRACION</div>

          </div>
         <br><br>
         <br>
        <div class="box-body">
                <table class="table-wrapper" >  
                   <thead>
                    <tr>
                      <th style="color: white; font-weight: bold;">N°</th> 
                      <th style="color: white; font-weight: bold;">Codigo</th>
                      <th style="color: white; font-weight: bold;">Cliente</th>
                      <th style="color: white; font-weight: bold;">Concepto</th>
                      <th style="color: white; font-weight: bold;">Debe</th>
                      <th style="color: white; font-weight: bold;">Haber</th>
                      <th style="color: white; font-weight: bold;">Saldo</th>
                    </tr>
                  </thead>
                  <?php 
                  $condominio = \SIGRECOFERO\condominio::all();
                  $n = 1;
                  $j=1;
                  $sum = 0;
                  $tup = 0;
                      ?>
              <?php $__currentLoopData = $condominio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $co): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <tbody>
                       
                    <?php 
                    if($cuenta->concepto == 'Todas'){
               $factu = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }else{
              $factu = \SIGRECOFERO\facturacion::where('concepto','=',$cuenta->concepto)->where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }
                   $count = count($factura);
                    
                    for ($i=0; $i < $count ; $i++) { 
                        # code...       
                    ?>
                    <?php if($factura[$i]->concepto == 'Administrativo'): ?>
                    <?php 
                    $val = $factura[$i]->cantidad;
                    $sum = $val * $j;
                    $j++;
                    $tap= $tup + 100;
                    if ($tap > 1024) {
                        $tap = 70;
                        $tup = 30;
                    }else{
                        $tap= $tap + 70;
                    }

                    ?>
                    <tr>          
                    <td style = "width:10%"><?php echo e($n++); ?></td> 
                    <td style = "width:10%"><?php echo e($co->codigo); ?></td>
                    <td style = "width:30%"><?php echo e($co->empresa->nombre); ?></td>
                    <td style = "width:30%"><?php echo e('Cuota '.$factura[$i]->concepto); ?></td>
                      <td style = "width:10%"> </td>
                      <td style = "width:10%"><?php echo e($factura[$i]->cantidad); ?></td>
                      <td style = "width:10%"><?php echo e($sum); ?></td>  
                    </tr>
                    <?php endif; ?>
                    <?php             } ?>
                   
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                
              </table>
              <footer>
            <table>
              <tr>
                <td>
                    <p class="izq">
                      Condominio Feria Rosas.
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
             <div>
              <div style="position: absolute;left: 50px;  z-index: 1;">22040105  INGRESOS DIFERIDOS PARQUEO</div>
              </div>
            <br><br>
            <div class="box-body">
                    <table class="table-wrapper" >  
                       <thead>
                        <tr>
                          <th style="color: white; font-weight: bold;">N°</th> 
                          <th style="color: white; font-weight: bold;">Codigo</th>
                          <th style="color: white; font-weight: bold;">Cliente</th>
                          <th style="color: white; font-weight: bold;">Concepto</th>
                          <th style="color: white; font-weight: bold;">Debe</th>
                          <th style="color: white; font-weight: bold;">Haber</th>
                          <th style="color: white; font-weight: bold;">Saldo</th>
                        </tr>
                      </thead>    
                      <?php 
                      $condominio = \SIGRECOFERO\condominio::all();
                      $n = 1;
                      $j=1;
                      $tup = 0;
                          ?>
                    <?php $__currentLoopData = $condominio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $co): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tbody>
                         
                      <?php 
                      if($cuenta->concepto == 'Todas'){
               $factu = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }else{
              $factu = \SIGRECOFERO\facturacion::where('concepto','=',$cuenta->concepto)->where('emision','=','Emitido')->where('mes','=',$cuenta->mes)->where('ano','=',$cuenta->ano)->where('id_Condominio','=',$c->id)->get();
             }
                      $count = count($factura);
                      
                      for ($i=0; $i < $count ; $i++) { 
                          # code...       
                      ?>
                      <?php if($factura[$i]->concepto == 'Parqueo'): ?>
                      <?php 
                      $val = $factura[$i]->cantidad;
                      $sum = $val + $sum;
                      $j++;
                      $tup = $tup + 70;
                      ?>
                      
                      <tr> 
                                
                      <td style = "width:10%"><?php echo e($n++); ?></td> 
                      <td style = "width:10%"><?php echo e($co->codigo); ?></td>
                      <td style = "width:30%"><?php echo e($co->empresa->nombre); ?></td>
                      <td style = "width:30%"><?php echo e('Cuota de '.$factura[$i]->concepto); ?></td>
                        <td style = "width:10%"> </td>
                        <td style = "width:10%"><?php echo e($factura[$i]->cantidad); ?> </td>
                        <td style = "width:10%"><?php echo e($sum); ?></td>  
                      </tr>
                      <?php endif; ?>
                      <?php             } ?>
                     
                  </tbody>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <div>        
                  </div>
                  </table>
                  <footer>
                <table>
                  <tr>
                    <td>
                        <p class="izq">
                          Condominio Feria Rosas.
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
</body>
</html>
