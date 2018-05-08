
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
<?php  $r='0'; ?>
<body> 
    @foreach($facturas as $f)
        <div class="col-md-12">
                <div class="box-header with-border">
                        
<?php 
        
        $letras = NumeroALetras::convertir($f->cantidad, 'dolares', 'centavos');
        $nombre = \SIGRECOFERO\empresa::find($f->id_Condominio);
        $mes = \SIGRECOFERO\estado::find($f->id_Estado);  
        $local = \SIGRECOFERO\condominio::find($f->id_Condominio);   
        ?>            
        <?php 
        if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '1' && $r=='0'){
        if(!is_null($nombre)){
            $r='1';
        ?>
        <div style="position: absolute;left: 650px; top: 57px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 80px; z-index: 1;"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 100px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
       

        <div style="position: absolute;left: 170px; top: {{'150'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
        <div style="position: absolute;left: 150px; top: {{'190'}}px; z-index: 1;"><h4>{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES DE: '.$mes->mes.' DEL AÑO : '.$mes->ano}}.</h4></div>
        <div style="position: absolute;left: 350px; top: {{'200'}}px; z-index: 1;"><h4>{{'LOCAL: '.$local->NLocal}}.</h4></div>
        <?php 
        }
    }else if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '0' && $r=='1'){
        if(!is_null($nombre)){
            $r='0';
        ?>  
               
        <div style="position: absolute;left: 650px; top: 550px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 580px; z-index: 1;"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 600px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
               
        
        <div style="position: absolute;left: 170px; top: {{'650'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
        <div style="position: absolute;left: 150px; top: {{'690'}}px; z-index: 1;"><h4>{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES DE: '.$mes->mes.' DEL AÑO : '.$mes->ano}}.</h4></div>
        <div style="position: absolute;left: 350px; top: {{'700'}}px; z-index: 1;"><h4>{{'LOCAL: '.$local->NLocal}}.</h4></div>
      </div>
    </div>
      </body>
      <body> 
        <?php }
        }else if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '1' && $r=='1'){
            if(!is_null($nombre)){
            $r='0';
             ?>

        <div style="position: absolute;left: 650px; top: 550px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 580px; z-index: 1;"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 600px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
               
        
        <div style="position: absolute;left: 170px; top: {{'650'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
        <div style="position: absolute;left: 150px; top: {{'690'}}px; z-index: 1;"><h4>{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES DE: '.$mes->mes.' DEL AÑO : '.$mes->ano}}.</h4></div>
        <div style="position: absolute;left: 350px; top: {{'700'}}px; z-index: 1;"><h4>{{'LOCAL: '.$local->NLocal}}.</h4></div>
      </div>
    </div>
      </body>
      <body>
        
        <?php }
        }else if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '0' && $r=='0'){ 
            if(!is_null($nombre)){
            $r='1';
            ?>
            <div style="position: absolute;left: 650px; top: 57px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
            <div style="position: absolute;left: 175px; top: 80px; z-index: 1;"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
            <div style="position: absolute;left: 175px; top: 100px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
           
    
            <div style="position: absolute;left: 170px; top: {{'150'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
            <div style="position: absolute;left: 150px; top: {{'190'}}px; z-index: 1;"><h4>{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES DE: '.$mes->mes.' DEL AÑO : '.$mes->ano}}.</h4></div>
            <div style="position: absolute;left: 350px; top: {{'200'}}px; z-index: 1;"><h4>{{'LOCAL: '.$local->NLocal}}.</h4></div>
            
        <?php }
        }
        ?>
        <?php 
                  
        $letras = NumeroALetras::convertir($f->cantidad, 'dolares', 'centavos');
        $nombre = \SIGRECOFERO\empresa::find($f->id_Condominio);
        $mes = \SIGRECOFERO\estado::find($f->id_Estado);     
        ?>            
        <?php 
        if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '1' && $r=='0'){
        if(!is_null($nombre)){
            $r='1';
        ?>
        <div style="position: absolute;left: 650px; top: 57px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 80px; z-index: 1;"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 100px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
       

        <div style="position: absolute;left: 170px; top: {{'150'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
        <div style="position: absolute;left: 150px; top: {{'190'}}px; z-index: 1;"><h4>{{'CUOTA DE PARQUEO CORRESPONDIENTE AL MES DE: '.$mes->mes.' DEL AÑO: '.$mes->ano}}.</h4></div>
        <div style="position: absolute;left: 350px; top: {{'200'}}px; z-index: 1;"><h4>{{'LOCAL: '.$local->NLocal}}.</h4></div>
        <?php 
        }
    }else if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '0' && $r=='1'){
        if(!is_null($nombre)){
            $r='0';
        ?>  
               
        <div style="position: absolute;left: 650px; top: 550px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 580px; z-index: 1;"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 600px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
               
        
        <div style="position: absolute;left: 170px; top: {{'650'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
        <div style="position: absolute;left: 150px; top: {{'690'}}px; z-index: 1;"><h4>{{'CUOTA DE PARQUEO CORRESPONDIENTE AL MES DE : '.$mes->mes.' DEL AÑO: '.$mes->ano}}.</h4></div>
        <div style="position: absolute;left: 350px; top: {{'700'}}px; z-index: 1;"><h4>{{'LOCAL: '.$local->NLocal}}.</h4></div>
      </div>
    </div>
      </body>
      <body> 
        <?php }
        }else if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '1' && $r=='1'){
            if(!is_null($nombre)){
            $r='0';
             ?>

        <div style="position: absolute;left: 650px; top: 550px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 580px; z-index: 1;"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 600px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
               
        
        <div style="position: absolute;left: 170px; top: {{'650'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
        <div style="position: absolute;left: 150px; top: {{'690'}}px; z-index: 1;"><h4>{{'CUOTA DE PARQUEO CORRESPONDIENTE AL MES DE : '.$mes->mes.' DEL AÑO: '.$mes->ano}}.</h4></div>
        <div style="position: absolute;left: 350px; top: {{'700'}}px; z-index: 1;"><h4>{{'LOCAL: '.$local->NLocal}}.</h4></div>
      </div>
    </div>
      </body>
      <body>
        
        <?php }
        }else if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '0' && $r=='0'){ 
            if(!is_null($nombre)){
            $r='1';
            ?>
            <div style="position: absolute;left: 650px; top: 57px; z-index: 1;"><h1>{{$f->cantidad}}</h1></div>
            <div style="position: absolute;left: 175px; top: 80px; z-index: 1;"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
            <div style="position: absolute;left: 175px; top: 100px; z-index: 1;"><h3>{{$nombre->nombre}}.</h3></div>
           
    
            <div style="position: absolute;left: 170px; top: {{'150'}}px; z-index: 1;"><h4>{{$letras}}.</h4></div>
            <div style="position: absolute;left: 150px; top: {{'190'}}px; z-index: 1;"><h4>{{'CUOTA DE PARQUEO CORRESPONDIENTE AL MES DE: '.$mes->mes.' DEL AÑO: '.$mes->ano}}.</h4></div>
            <div style="position: absolute;left: 350px; top: {{'200'}}px; z-index: 1;"><h4>{{'LOCAL: '.$local->NLocal}}.</h4></div>
            
        <?php }
        }
        ?>
        </div>
    </div>
    
  @endforeach
          </body>

</html>

