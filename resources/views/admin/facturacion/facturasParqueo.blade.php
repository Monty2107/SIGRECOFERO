
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FACTURACION</title>
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
        background-color: #4f8ba0;
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
      background: #F5F5F5;
    }
  </style>
</head>
@foreach($facturas as $f)
<?php 
if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '1'){
?>
<body> 
        <div class="col-md-12">
                <div class="box-header with-border">
<?php 
        
        $letras = NumeroALetras::convertir($f->cantidad, 'dolares', 'centavos');
        $nombre = \SIGRECOFERO\empresa::find($f->id_Condominio);

        $n = $f->increment('id_Condominio');
        $f2 = \SIGRECOFERO\facturacion::where('concepto','=','Parqueo')->where('emision','=','No Emitido')->where('id_Condominio','=',$f->id_Condominio)->get()->last();
        $n = $f->decrement('id_Condominio');
        
        $letras2 = NumeroALetras::convertir($f2->cantidad, 'dolares', 'centavos');
        $nombre2 = \SIGRECOFERO\empresa::find($f2->id_Condominio);
        ?>            
        <?php 
        if(!is_null($nombre) && $f->concepto == 'Parqueo'){
        ?>
        <div style="position: absolute;left: 650px; top: 57px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 100px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
       

        <div style="position: absolute;left: 170px; top: {{'150'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
        <div style="position: absolute;left: 150px; top: {{'200'}}px; z-index: 1;"><h4>{{'CUOTA ADMINISTRATIVA DEL MES DE: '.$f->mes}}.</h4></div>
        <?php 
        }
        if(!is_null($nombre2) && $f->concepto == 'Parqueo'){
        ?>  
               
        <div style="position: absolute;left: 650px; top: 550px; z-index: 1;"><h1>{{$f2->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 600px; z-index: 1;"><h3>{{$nombre2->nombre}}.</h3></div>
               
        
        <div style="position: absolute;left: 170px; top: {{'650'}}px; z-index: 1;"><h4>{{$letras2}}.</h4></div>
        <div style="position: absolute;left: 150px; top: {{'700'}}px; z-index: 1;"><h4>{{'CUOTA ADMINISTRATIVA'}}.</h4></div>
        <?php } ?>
        </div>
    </div>
          </body>
          <?php 
          }
          ?>

  @endforeach
</html>

