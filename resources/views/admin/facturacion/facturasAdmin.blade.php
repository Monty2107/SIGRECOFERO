
<?php
// Download printer driver for dot matrix printer ex. 1979 Dot Matrix      Regular or Consola

?>
<html>
<head>
<title>Facturas Administrativas</title>

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
top: 157px;
left: 10px;
position:absolute;
}
#payee {
top: 157px;
left: 200px;
position:absolute;
}
#credit {
top: 157px;
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
    @foreach($facturas as $f)
                        
<?php 
        
        $letras = NumeroALetras::convertir($f->cantidad, 'dolares', 'centavos');
        $nombre = \SIGRECOFERO\empresa::find($f->id_Condominio);
        $mes = \SIGRECOFERO\estado::find($f->id_Estado); 
        $local = \SIGRECOFERO\condominio::find($f->id_Condominio);
        $carbon = new \Carbon\carbon();    
        ?>            
       <?php 
       if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '1' && $r=='0'){
       if(!is_null($nombre)){
           $r='1';
       ?>
       <body> 
           <div class="col-md-12">
                   <div class="box-header with-border">
       <div style="position: absolute;left: 650px; top: 107px; z-index: 1;" class="customFont"><h1>{{$f->cantidad}}</h1></div>
       <div style="position: absolute;left: 175px; top: 157px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
       <div style="position: absolute;left: 175px; top: 170px; z-index: 1;" class="customFont"><h3>{{$nombre->nombre}}.</h3></div>
      

       <div style="position: absolute;left: 170px; top: {{'200'}}px; z-index: 1;" class="customFont"><h3>{{$letras}}.</h3></div>
       <div style="position: absolute;left: 150px; top: {{'245'}}px; z-index: 1;" class="customFont"><h3>{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</h3></div>
        <div style="position: absolute;left: 150px; top: {{'262'}}px; z-index: 1;" class="customFont"><h3>{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</h3></div>
        <div style="position: absolute;left: 450px; top: {{'370'}}px; z-index: 1;" class="customFont"><h3>{{$carbon->format('d/m/Y')}}.</h3></div>
       <?php 
       }
   }else if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '0' && $r=='1'){
       if(!is_null($nombre)){
           $r='0';
       ?>  
              
              <div style="position: absolute;left: 650px; top: 715px; z-index: 1;" class="customFont"><h1>{{$f->cantidad}}</h1></div>
              <div style="position: absolute;left: 175px; top: 745px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
              <div style="position: absolute;left: 175px; top: 765px; z-index: 1;" class="customFont"><h3>{{$nombre->nombre}}.</h3></div>
                     
              
              <div style="position: absolute;left: 170px; top: {{'815'}}px; z-index: 1;" class="customFont"><h3>{{$letras}}.</h3></div>
              <div style="position: absolute;left: 150px; top: {{'855'}}px; z-index: 1;" class="customFont"><h3>{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</h3></div>
              <div style="position: absolute;left: 150px; top: {{'873'}}px; z-index: 1;" class="customFont"><h3>{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</h3></div>
              <div style="position: absolute;left: 450px; top: {{'980'}}px; z-index: 1;" class="customFont"><h3>{{$carbon->format('d/m/Y')}}.</h3></div>
     </div>
   </div>
     </body>

       <?php }
       }else if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '1' && $r=='1'){
           if(!is_null($nombre)){
           $r='0';
            ?>
            
       <div style="position: absolute;left: 650px; top: 715px; z-index: 1;" class="customFont"><h1>{{$f->cantidad}}</h1></div>
       <div style="position: absolute;left: 175px; top: 745px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
       <div style="position: absolute;left: 175px; top: 765px; z-index: 1;" class="customFont"><h3>{{$nombre->nombre}}.</h3></div>
              
       
       <div style="position: absolute;left: 170px; top: {{'815'}}px; z-index: 1;" class="customFont"><h3>{{$letras}}.</h3></div>
       <div style="position: absolute;left: 150px; top: {{'855'}}px; z-index: 1;" class="customFont"><h3>{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</h3></div>
       <div style="position: absolute;left: 150px; top: {{'873'}}px; z-index: 1;" class="customFont"><h3>{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</h3></div>
       <div style="position: absolute;left: 450px; top: {{'980'}}px; z-index: 1;" class="customFont"><h3>{{$carbon->format('d/m/Y')}}.</h3></div>
     </div>
   </div>
     </body>

       
       <?php }
       }else if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '0' && $r=='0'){ 
           if(!is_null($nombre)){
           $r='1';
           ?>
           <body> 
               <div class="col-md-12">
                       <div class="box-header with-border">
           <div style="position: absolute;left: 650px; top: 107px; z-index: 1;" class="customFont"><h1>{{$f->cantidad}}</h1></div>
           <div style="position: absolute;left: 175px; top: 157px; z-index: 1;" class="customFont"><h5>{{'CODIGO: '.$local->codigo}}.</h5></div>
           <div style="position: absolute;left: 175px; top: 170px; z-index: 1;" class="customFont"><h3>{{$nombre->nombre}}.</h3></div>
          
   
           <div style="position: absolute;left: 170px; top: {{'200'}}px; z-index: 1;" class="customFont"><h3>{{$letras}}.</h3></div>
           <div style="position: absolute;left: 150px; top: {{'245'}}px; z-index: 1;" class="customFont"><h3>{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</h3></div>
           <div style="position: absolute;left: 150px; top: {{'262'}}px; z-index: 1;" class="customFont"><h3>{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</h3></div>
           <div style="position: absolute;left: 450px; top: {{'370'}}px; z-index: 1;" class="customFont"><h3>{{$carbon->format('d/m/Y')}}.</h3></div>
           
       <?php }
       }
       ?>

@endforeach
        </div>
    </div>
          </body>

</html>

