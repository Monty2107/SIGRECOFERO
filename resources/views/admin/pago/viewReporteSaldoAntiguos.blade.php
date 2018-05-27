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
    padding: 10px;
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
        <HR style="position: absolute;left: 270px; top: 30px; z-index: 1; color:black;" width=35%>
        <div style="position: absolute;left: 300px; top: 20px; z-index: 1; color:#1890a2; font-family: fantasy; font-weight: bold;"><h2>Condominios Feria Rosa</h2></div>
        <HR style="position: absolute;left: 270px; top: 50px; z-index: 1; color:black;" width=35%>
        <div style="position: absolute;left: 300px; top: 80px; z-index: 1; font-style: italic; font-weight: bold;">Alameda Manuel Enrique Araujo  </div>
        <div style="position: absolute;left: 260px; top: 90px; z-index: 1;"><h4>Condominio Feria Rosa Local B-133 San Salvador.</h4></div>
        <div style="position: absolute;left: 330px; top: 110px; z-index: 1;"><h4>Telefono: 2243-3705 </h4></div>
        



        <HR style="position: absolute;left: 23px; top: 135px; z-index: 1; color:black;" width=93%>
            <?php   
            $carbon = new \Carbon\Carbon();
            $dates = $carbon->now();
            ?>
        <div style="position: absolute;left: 550px; top: 145px; z-index: 1;">Fecha:  {{$dates->format('d-m-Y')}} </div>
        <h3 align="right" style="position: absolute;left:40; top:10px; px; z-index: 1;"><img class="al img-responsive" alt="image" width="110px" height="110px" src="img/gano4.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
          <?php 
          $fechaIordenada = explode('-',$fechaInicio);
          $fechaFordenada = explode('-',$fechaFinal);
          $n =1;
            ?>
      <div style="position: absolute;left: 150px; top: 180px; z-index: 1;"><h3>SALDOS ANTIGUOS DE: {{$fechaIordenada[2].' - ' .$fechaIordenada[1].' - '.
    $fechaIordenada[0].' '}} HASTA: {{$fechaFordenada[2].' - ' .$fechaFordenada[1].' - '.$fechaFordenada[0]}}</h3></div>

<?php 
                    $count = count($arrayCondominio);
                    for ($i=0; $i < $count ; $i++) { 
                        # code...
                        $condominio = \SIGRECOFERO\condominio::find($arrayCondominio[$i]);
                        
                    ?>
                    <div>
                        <span> NOMBRE DEL CONDOMINE:   </span>
                    <span> {{$condominio->empresa->nombre}} </span>
                    </div>

        <table class="table-wrapper" >
            
           <thead>
            <tr>
              <th style="color: white; font-weight: bold;">N°</th> 
              <th style="color: white; font-weight: bold;">Fecha de Faturacion</th>
              <th style="color: white; font-weight: bold;">Mes</th>
              <th style="color: white; font-weight: bold;">Concepto</th>
              <th style="color: white; font-weight: bold;">Cantidad</th>
              <th style="color: white; font-weight: bold;">Saldo</th>
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

          @if($concaval >= $concaI && $concaval <= $concaF)
          <?php $total = $factura[$j]->cantidad + $total; ?>
          <tr>
                <td style = "width:10%">{{$nu++}}</td>
                <td style = "width:20%">{{$fecha->dia.' - '.$fecha->mes.' - '.$fecha->ano}} </td>
                <td style = "width:20%">{{$factura[$j]->mes}}</td>
                <td style = "width:20%">{{$factura[$j]->concepto}}</td>
                <td style = "width:30%">$ {{$factura[$j]->cantidad}}</td>
                <td style = "width:30%">$ {{$total}}</td>
            </tr>
            @endif
            
          <?php } ?>

          <?php 
            $deudas = \SIGRECOFERO\AntiguedadSaldo::where('id_Condominio','=',$condominio->id)->where('estado','=','Deudas')->sum('cantidad');
            $pagos = \SIGRECOFERO\AntiguedadSaldo::where('id_Condominio','=',$condominio->id)->where('estado','=','Pagos')->sum('cantidad');
            $antiguo = \SIGRECOFERO\AntiguedadSaldo::where('id_Condominio','=',$condominio->id)->where('estado','=','Antiguo')->sum('cantidad');
            $sum = ($antiguo + $deudas) - $pagos;
                ?>
            <tr>
                    <td style = "width:10%">{{$nu}}</td>
                    <td style = "width:20%"> -- </td>
                    <td style = "width:20%"> -- </td>
                    <td style = "width:20%">Saldo Antiguo</td>
                    <td style = "width:20%">$ {{$antiguo}}</td>
                    <td style = "width:30%">$ {{$antiguo + $deudas}}</td>
            </tr>
            <tr>
                    <td style = "width:10%"> </td>
                    <td style = "width:20%"> </td>
                    <td style = "width:20%"> </td>
                    <td style = "width:20%"> </td>
                    <td style = "width:20%">TOTAL DE SALDO ANTIGUO:</td>
                    <td style = "width:30%">$ {{$sum}}</td>
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
