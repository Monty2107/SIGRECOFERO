
<?php
// Download printer driver for dot matrix printer ex. 1979 Dot Matrix      Regular or Consola

?>
<html>
<head>
<title>Factura Individual</title>

<style>
@font-face { 
font-family: kitfont; 
src: url(“font-matricial/font/1979_dot_matrix.eot”);
src: url(“font-matricial/font/1979_dot_matrix.eot”) format(“embedded-opentype”),
url(“font-matricial/font/1979_dot_matrix.woff”) format(“woff”),
url(“font-matricial/font/1979_dot_matrix.ttf”) format(“truetype”),
url(“font-matricial/font/1979_dot_matrix.svg”) format(“svg”); } 

.customFont { /*  <div class="customFont" /> */
font-style: kitfont;
font-size:10;
}
#mainDiv {
height: 324px; /* height of receipt 4.5 inches*/
width: 618px;  /* weight of receipt 8.6 inches*/
position:relative; /* positioned relative to its normal position */
}
#cqm { /*  <img id="cqm" /> */
top: 10px; /* top is distance from top (x axis)*/
left: 105px; /* left is distance from left (y axis)*/
position:absolute; /* position absolute based on "top" and "left"    parameters x and y  */
}

#or_mto { 
position: absolute;
left: 0px;
top: 0px;
z-index: -1; /*image */
}

   #arpno {
top: 60px;
left: 10px;
position:absolute;
}
#payee {
top: 60px;
left: 200px;
position:absolute;
}
#credit {
top: 60px;
right: 30px; /*   distance from right */
position:absolute;
}
#paydate {
top: 107px;
right: 120px;
position:absolute;
}
</style>

</head>
<?php  $r='0'; ?>
                       
<?php 
        
        $letras = NumeroALetras::convertir($facturas->cantidad, 'dolares', 'centavos');
        $nombre = \SIGRECOFERO\empresa::find($facturas->id_Condominio);
        $mes = \SIGRECOFERO\estado::find($facturas->id_Estado);  
        $local = \SIGRECOFERO\condominio::find($facturas->id_Condominio);  
        $carbon = new \Carbon\carbon(); 
        ?>            
        <?php 
        if($facturas->concepto == 'Administrativo' && $facturas->id_Condominio % 2 == '1' && $r=='0'){
        if(!is_null($nombre)){
            $r='1';
        ?>
        <body> 
            <div class="col-md-12">
                    <div class="box-header with-border">
        <div style="position: absolute;left: 650px; top: 107px; z-index: 1;" class="customFont"><h1>{{$facturas->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 60px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 165px; z-index: 1;" class="customFont"><p style="font-weight: 100; font-size:16px;" >{{$nombre->nombre}}.</p></div>
       

        <div style="position: absolute;left: 170px; top: {{'220'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$letras}}.</p></div>
        <div style="position: absolute;left: 150px; top: {{'250'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</p></div>
         <div style="position: absolute;left: 150px; top: {{'267'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</p></div>
         <div style="position: absolute;left: 450px; top: {{'370'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$carbon->format('d/m/Y')}}.</p></div>
        <?php 
        }
    }else if($facturas->concepto == 'Administrativo' && $facturas->id_Condominio % 2 == '0' && $r=='1'){
        if(!is_null($nombre)){
            $r='0';
        ?>  
               
               <div style="position: absolute;left: 650px; top: 690px; z-index: 1;" class="customFont"><h1>{{$facturas->cantidad}}</h1></div>
               <div style="position: absolute;left: 175px; top: 640px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
               <div style="position: absolute;left: 175px; top: 735px; z-index: 1;" class="customFont"><p style="font-weight: 100; font-size:16px;" >{{$nombre->nombre}}.</p></div>
                      
               
               <div style="position: absolute;left: 170px; top: {{'795'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$letras}}.</p></div>
               <div style="position: absolute;left: 150px; top: {{'835'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</p></div>
               <div style="position: absolute;left: 150px; top: {{'853'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</p></div>
               <div style="position: absolute;left: 450px; top: {{'965'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$carbon->format('d/m/Y')}}.</p></div>
      </div>
    </div>
      </body>

        <?php }
        }else if($facturas->concepto == 'Administrativo' && $facturas->id_Condominio % 2 == '1' && $r=='1'){
            if(!is_null($nombre)){
            $r='0';
             ?>
             
        <div style="position: absolute;left: 650px; top: 690px; z-index: 1;" class="customFont"><h1>{{$facturas->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 640px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 735px; z-index: 1;" class="customFont"><p style="font-weight: 100; font-size:16px;" >{{$nombre->nombre}}.</p></div>
               
        
        <div style="position: absolute;left: 170px; top: {{'795'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$letras}}.</p></div>
        <div style="position: absolute;left: 150px; top: {{'835'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</p></div>
        <div style="position: absolute;left: 150px; top: {{'853'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</p></div>
        <div style="position: absolute;left: 450px; top: {{'965'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$carbon->format('d/m/Y')}}.</p></div>
      </div>
    </div>
      </body>

        
        <?php }
        }else if($facturas->concepto == 'Administrativo' && $facturas->id_Condominio % 2 == '0' && $r=='0'){ 
            if(!is_null($nombre)){
            $r='1';
            ?>
            <body> 
                <div class="col-md-12">
                        <div class="box-header with-border">
            <div style="position: absolute;left: 650px; top: 107px; z-index: 1;" class="customFont"><h1>{{$facturas->cantidad}}</h1></div>
            <div style="position: absolute;left: 175px; top: 60px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
            <div style="position: absolute;left: 175px; top: 165px; z-index: 1;" class="customFont"><p style="font-weight: 100; font-size:16px;" >{{$nombre->nombre}}.</p></div>
           
    
            <div style="position: absolute;left: 170px; top: {{'220'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$letras}}.</p></div>
            <div style="position: absolute;left: 150px; top: {{'250'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</p></div>
            <div style="position: absolute;left: 150px; top: {{'267'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</p></div>
            <div style="position: absolute;left: 450px; top: {{'370'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$carbon->format('d/m/Y')}}.</p></div>
            
        <?php }
        }
        ?>
            
        <?php 
        if($facturas->concepto == 'Parqueo' && $facturas->id_Condominio % 2 == '1' && $r=='0'){
        if(!is_null($nombre)){
            $r='1';
        ?>
        <body> 
            <div class="col-md-12">
                    <div class="box-header with-border">
        <div style="position: absolute;left: 650px; top: 107px; z-index: 1;" class="customFont"><h1>{{$facturas->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 60px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 165px; z-index: 1;" class="customFont"><p style="font-weight: 100; font-size:16px;" >{{$nombre->nombre}}.</p></div>
       

        <div style="position: absolute;left: 170px; top: {{'220'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$letras}}.</p></div>
        <div style="position: absolute;left: 150px; top: {{'250'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'CUOTA PARQUEO CORRESPONDIENTE AL MES'}}</p></div>
         <div style="position: absolute;left: 150px; top: {{'267'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</p></div>
        <div style="position: absolute;left: 450px; top: {{'370'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$carbon->format('d/m/Y')}}.</p></div>
        <?php 
        }
    }else if($facturas->concepto == 'Parqueo' && $facturas->id_Condominio % 2 == '0' && $r=='1'){
        if(!is_null($nombre)){
            $r='0';
        ?>  
               
               <div style="position: absolute;left: 650px; top: 690px; z-index: 1;" class="customFont"><h1>{{$facturas->cantidad}}</h1></div>
               <div style="position: absolute;left: 175px; top: 640px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
               <div style="position: absolute;left: 175px; top: 735px; z-index: 1;" class="customFont"><p style="font-weight: 100; font-size:16px;" >{{$nombre->nombre}}.</p></div>
                      
               
               <div style="position: absolute;left: 170px; top: {{'795'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$letras}}.</p></div>
               <div style="position: absolute;left: 150px; top: {{'835'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'CUOTA PARQUEO CORRESPONDIENTE AL MES'}}</p></div>
               <div style="position: absolute;left: 150px; top: {{'853'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</p></div>
               <div style="position: absolute;left: 450px; top: {{'965'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$carbon->format('d/m/Y')}}.</p></div>
      </div>
    </div>
      </body>

        <?php }
        }else if($facturas->concepto == 'Parqueo' && $facturas->id_Condominio % 2 == '1' && $r=='1'){
            if(!is_null($nombre)){
            $r='0';
             ?>

<div style="position: absolute;left: 650px; top: 690px; z-index: 1;" class="customFont"><h1>{{$facturas->cantidad}}</h1></div>
        <div style="position: absolute;left: 175px; top: 640px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
        <div style="position: absolute;left: 175px; top: 735px; z-index: 1;" class="customFont"><p style="font-weight: 100; font-size:16px;" >{{$nombre->nombre}}.</p></div>
               
        
        <div style="position: absolute;left: 170px; top: {{'795'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$letras}}.</p></div>
        <div style="position: absolute;left: 150px; top: {{'835'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'CUOTA PARQUEO CORRESPONDIENTE AL MES'}}</p></div>
        <div style="position: absolute;left: 150px; top: {{'853'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</p></div>
        <div style="position: absolute;left: 450px; top: {{'965'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$carbon->format('d/m/Y')}}.</p></div>
      </div>
    </div>
      </body>
        
        <?php }
        }else if($facturas->concepto == 'Parqueo' && $facturas->id_Condominio % 2 == '0' && $r=='0'){ 
            if(!is_null($nombre)){
            $r='1';
            ?>
            <body> 
                <div class="col-md-12">
                        <div class="box-header with-border">
            <div style="position: absolute;left: 650px; top: 107px; z-index: 1;" class="customFont"><h1>{{$facturas->cantidad}}</h1></div>
            <div style="position: absolute;left: 175px; top: 60px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
            <div style="position: absolute;left: 175px; top: 165px; z-index: 1;" class="customFont"><p style="font-weight: 100; font-size:16px;" >{{$nombre->nombre}}.</p></div>
           
    
            <div style="position: absolute;left: 170px; top: {{'220'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$letras}}.</p></div>
            <div style="position: absolute;left: 150px; top: {{'250'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'CUOTA PARQUEO CORRESPONDIENTE AL MES'}}</p></div>
            <div style="position: absolute;left: 150px; top: {{'267'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</p></div>
            <div style="position: absolute;left: 450px; top: {{'370'}}px; z-index: 1;" class="customFont"><p style="font-weight: 100;">{{$carbon->format('d/m/Y')}}.</p></div>
            
        <?php }
        }
        ?>
</html>