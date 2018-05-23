<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte Bitacoras</title>
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
        <HR style="position: absolute;left: 270px; top: 30px; z-index: 1; color:black;" width=35%>
        <div style="position: absolute;left: 300px; top: 20px; z-index: 1; color:#1890a2; font-family: fantasy; font-weight: bold;"><h2>Condominios Feria Rosa</h2></div>
        <HR style="position: absolute;left: 270px; top: 50px; z-index: 1; color:black;" width=35%>
        <div style="position: absolute;left: 260px; top: 80px; z-index: 1; font-style: italic; font-weight: bold;"> </div>
        <div style="position: absolute;left: 360px; top: 110px; z-index: 1;"><h4> </h4></div>
        <div style="position: absolute;left: 420px; top: 90px; z-index: 1;"><h4>Telefono: 2243-3705 </h4></div>
        



        <HR style="position: absolute;left: 23px; top: 135px; z-index: 1; color:black;" width=93%>
        <?php   
          $dato = explode("-",(String)$date);
          $fecha = $dato[2]."/".$dato[1]."/".$dato[0];
          ?>
        <div style="position: absolute;left: 550px; top: 145px; z-index: 1;">Fecha:  <?=  $fecha; ?> </div>
        <h3 align="right" style="position: absolute;left:40; top:10px; px; z-index: 1;"><img class="al img-responsive" alt="image" width="110px" height="110px" src="img/gano4.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <?php  
          $bitas = SIGRECOFERO\bitacora::all();
        
           ?>
        <div style="position: absolute;left: 310px; top: 180px; z-index: 1;"><h3>BITACORA</h3></div>
        <table class="table-wrapper" >
           <thead>
            <tr>
              <th style="color: white; font-weight: bold;">N</th> 
              <th style="color: white; font-weight: bold;">Fecha</th>
              <th style="color: white; font-weight: bold;">Hora</th>
              <th style="color: white; font-weight: bold;">Descripción</th>
              <th style="color: white; font-weight: bold;">Usuario<th>
                  <th style="color: white; font-weight: bold;">Cargo<th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; ?>
            <?php foreach($bitas as $bita): ?>
              
            <?php
            $dato = explode(" ",(String)$bita->created_at);
            $fecha = $dato[0];
            $hora = $dato[1];
            $datoFecha = explode("-",(String)$fecha);
            $fechaOrdenada = $datoFecha[2]."/".$datoFecha[1]."/".$datoFecha[0];
            $usu = SIGRECOFERO\User::find($bita->id_Usuario);
             ?>

              <tr>
              <td style = "width:10%">{{$n}}</td> 
              <td style = "width:20%">{{$fechaOrdenada}}</td>
              <td style = "width:20%">{{$hora}}</td>
              <td style = "width:30%">{{$bita->comentario_Bit}}</td>
              <td style = "width:20%">{{$usu->name}}</td>
              <td style = "width:20%">{{$usu->cargo}}</td>
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
