<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Estado de Cuenta</title>
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
    
}


table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 15px;
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
    text-align: center;
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
        $factura = \SIGRECOFERO\facturacion::where('emision','=','Emitido')->where('estado','=', 0)->where('id_Condominio','=',$condomine->id)->get();
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
          ?>
        <div style="position: absolute;left: 550px; top: 145px; z-index: 1;">Fecha:  <?=  $date->format('d/m/Y'); ?> </div>
        <h3 align="right" style="position: absolute;left:40; top:10px; px; z-index: 1;"><img class="al img-responsive" alt="image" width="110px" height="110px" src="img/gano4.png" ></h3>

        <div style="position: absolute;left: 20px; top: 160px; z-index: 1;"><h3>Codigo:</h3></div>
        <div style="position: absolute;left: 200px; top: 160px; index: 1;"><h3>{{$condomine->codigo}} </h3></div>
        <div style="position: absolute;left: 20px; top: 180px; z-index: 1;"><h3>Nombre Del Condomine:</h3></div>
        <div style="position: absolute;left: 200px; top: 180px; index: 1;"><h3>{{$condomine->empresa->nombre}} </h3></div>
        <div style="position: absolute;left: 20px; top: 200px; index: 1;"><h3>Local N°:</h3></div>
        <div style="position: absolute;left: 200px; top: 200px; index: 1;"><h3>{{$condomine->NLocal}} </h3></div>
        <div style="position: absolute;left: 20px; top: 220px; z-index: 1;"><h3>Telefono Fijo: </h3></div>
        <div style="position: absolute;left: 200px; top: 220px; index: 1;"><h3>{{$condomine->empresa->telefonoFijo}} </h3></div>
        <div style="position: absolute;left: 20px; top: 240px; z-index: 1;"><h3>Contacto: </h3></div>
        <div style="position: absolute;left: 200px; top: 240px; index: 1;"><h3> {{$condomine->nombre}} </h3></div>
        
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        
        
      </div><!-- /.box-header -->
      <div class="box-body">
        <?php  
          $bitas = SIGRECOFERO\bitacora::all();
        
           ?>
        <div style="position: absolute;left: 300px; top: 280px; z-index: 1;"><h2>Estado de Cuenta</h2></div>
        <table class="table-wrapper" >
           <thead>
            <tr>
              <th style="color: white; font-weight: bold;">N</th> 
              <th style="color: white; font-weight: bold;">Fecha de Emision</th>
              <th style="color: white; font-weight: bold;">Nombre</th>
              <th style="color: white; font-weight: bold;">Concepto</th>
              <th style="color: white; font-weight: bold;">Mes Facturado</th>
              <th style="color: white; font-weight: bold;">Monto</th>
                <th style="color: white; font-weight: bold;">Observaciones: </th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; ?>              

             @foreach($factura as $f)
              <tr>
                  <?php $fecha1 = \SIGRECOFERO\fecha::find($f->id_Fecha); ?>
              <td style = "width:5%">{{$n}}</td> 
              <td style = "width:7%">{{$fecha1->dia.' - '.$fecha1->mes.' - '.$fecha1->ano}}</td>
              <td style = "width:20%">{{$condomine->empresa->nombre}}</td>
              <td style = "width:10%">{{$f->concepto}}</td>
              <td style = "width:7%">{{$f->mes}}</td>
              <td style = "width:5%">$ {{$f->cantidad}}</td>
              <td style = "width:30%"> </td>
            </tr>
            <?php $n++; ?>
            @endforeach

        </tbody>
      </table>
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
