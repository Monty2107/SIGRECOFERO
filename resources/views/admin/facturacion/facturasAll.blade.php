
<?php
// Download printer driver for dot matrix printer ex. 1979 Dot Matrix      Regular or Consola

?>
<html>
<head>
<title>PHP to Dot Matrix Printer</title>

<style>
@font-face { 
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
}


.customFont { /*  <div class="customFont" /> */
font-style: calibris;
font-size:14;
font-weight: 100;
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
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
top: 100px;
left: 10px;
position:absolute;
}
#payee {
top: 100px;
left: 200px;
position:absolute;
}
#credit {
top: 100px;
right: 30px; /*   distance from right */
position:absolute;
}
#paydate {
top: 127px;
right: 120px;
position:absolute;
}
</style>

</head>
<?php  $r='0'; ?>

    @foreach($facturas as $f)

                        
<?php 
        
        $letras = NumeroALetras::convertir($f->cantidad, 'dolares','centavos');
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
        <div style="position: absolute;left: 650px; top: 127px; z-index: 1; font-size:20; " class="customFont">{{$f->cantidad}}</div>
        <div style="position: absolute;left: 175px; top: 100px; z-index: 1; text-transform: uppercase; " class="customFont">{{'CODIGO: '.$local->codigo}}.</div>
        <div style="position: absolute;left: 175px; top: 170px; z-index: 1; font-size:17; text-transform: uppercase;" class="customFont">{{$nombre->nombre}}.</div>
       
        <div style="position: absolute;left: 170px; top: {{'224'}}px; z-index: 1; text-transform: uppercase; font-size:16; " class="customFont">{{$letras}}.</div>
        <div style="position: absolute;left: 150px; top: {{'267'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</div>
        <div style="position: absolute;left: 150px; top: {{'284'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</div>

         <div style="position: absolute;left: 400px; top: {{'384'}}px; z-index: 1;" class="customFont">{{$carbon->format('d/m/Y')}}.</div>
        <?php 
        }
    }else if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '0' && $r=='1'){
        if(!is_null($nombre)){
            $r='0';
        ?>  
               
               <div style="position: absolute;left: 650px; top: {{'710'}}px; z-index: 1; font-size:20;" class="customFont">{{$f->cantidad}}</div>
               <div style="position: absolute;left: 175px; top: 680px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CODIGO: '.$local->codigo}}.</div>
               <div style="position: absolute;left: 175px; top: 742px; z-index: 1; font-size:17; text-transform: uppercase;" class="customFont">{{$nombre->nombre}}.</div>
                      
               
               <div style="position: absolute;left: 170px; top: {{'799'}}px; z-index: 1; text-transform: uppercase; font-size:16;" class="customFont">{{$letras}}.</div>
               <div style="position: absolute;left: 150px; top: {{'852'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</div>
               <div style="position: absolute;left: 150px; top: {{'870'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</div>
               <div style="position: absolute;left: 400px; top: {{'965'}}px; z-index: 1;" class="customFont">{{$carbon->format('d/m/Y')}}.</div>
      </div>
    </div>
      </body>

        <?php }
        }else if($f->concepto == 'Administrativo' && $f->id_Condominio % 2 == '1' && $r=='1'){
            if(!is_null($nombre)){
            $r='0';
             ?>
             
        <div style="position: absolute;left: 650px; top: {{'710'}}px; z-index: 1; font-size:20;" class="customFont">{{$f->cantidad}}</div>
        <div style="position: absolute;left: 175px; top: 680px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CODIGO: '.$local->codigo}}.</div>
        <div style="position: absolute;left: 175px; top: 742px; z-index: 1; font-size:17; text-transform: uppercase;" class="customFont">{{$nombre->nombre}}.</div>
               
        
        <div style="position: absolute;left: 170px; top: {{'799'}}px; z-index: 1; text-transform: uppercase; font-size:16;" class="customFont">{{$letras}}.</div>
        <div style="position: absolute;left: 150px; top: {{'852'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</div>
        <div style="position: absolute;left: 150px; top: {{'870'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</div>
        <div style="position: absolute;left: 400px; top: {{'965'}}px; z-index: 1;" class="customFont">{{$carbon->format('d/m/Y')}}.</div>
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
            <div style="position: absolute;left: 650px; top: 127px; z-index: 1; font-size:20;" class="customFont">{{$f->cantidad}}</div>
            <div style="position: absolute;left: 175px; top: 100px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CODIGO: '.$local->codigo}}.</div>
            <div style="position: absolute;left: 175px; top: 170px; z-index: 1; font-size:17; text-transform: uppercase;" class="customFont">{{$nombre->nombre}}.</div>
           
    
            <div style="position: absolute;left: 170px; top: {{'224'}}px; z-index: 1; text-transform: uppercase; font-size:16;" class="customFont">{{$letras}}.</div>
            <div style="position: absolute;left: 150px; top: {{'267'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CUOTA ADMINISTRATIVA CORRESPONDIENTE AL MES'}}</div>
            <div style="position: absolute;left: 150px; top: {{'284'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</div>
            <div style="position: absolute;left: 400px; top: {{'384'}}px; z-index: 1;" class="customFont">{{$carbon->format('d/m/Y')}}.</div>
            
        <?php }
        }
        ?>
            
        <?php 
        if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '1' && $r=='0'){
        if(!is_null($nombre)){
            $r='1';
        ?>
        <body> 
            <div class="col-md-12">
                    <div class="box-header with-border">
        <div style="position: absolute;left: 650px; top: 127px; z-index: 1; font-size:20;" class="customFont">{{$f->cantidad}}</div>
        <div style="position: absolute;left: 175px; top: 100px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CODIGO: '.$local->codigo}}.</div>
        <div style="position: absolute;left: 175px; top: 170px; z-index: 1; font-size:17; text-transform: uppercase;" class="customFont">{{$nombre->nombre}}.</div>
       

        <div style="position: absolute;left: 170px; top: {{'224'}}px; z-index: 1; text-transform: uppercase; font-size:16;" class="customFont">{{$letras}}.</div>
        <div style="position: absolute;left: 150px; top: {{'267'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CUOTA PARQUEO CORRESPONDIENTE AL MES'}}</div>
         <div style="position: absolute;left: 150px; top: {{'284'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</div>
        <div style="position: absolute;left: 400px; top: {{'384'}}px; z-index: 1;" class="customFont">{{$carbon->format('d/m/Y')}}.</div>
        <?php 
        }
    }else if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '0' && $r=='1'){
        if(!is_null($nombre)){
            $r='0';
        ?>  
               
               <div style="position: absolute;left: 650px; top: {{'710'}}px; z-index: 1; font-size:20;" class="customFont">{{$f->cantidad}}</div>
               <div style="position: absolute;left: 175px; top: 680px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CODIGO: '.$local->codigo}}.</div>
               <div style="position: absolute;left: 175px; top: 742px; z-index: 1; font-size:17; text-transform: uppercase;" class="customFont">{{$nombre->nombre}}.</div>
                      
               
               <div style="position: absolute;left: 170px; top: {{'799'}}px; z-index: 1; text-transform: uppercase; font-size:16;" class="customFont">{{$letras}}.</div>
               <div style="position: absolute;left: 150px; top: {{'852'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CUOTA PARQUEO CORRESPONDIENTE AL MES'}}</div>
               <div style="position: absolute;left: 150px; top: {{'870'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</div>
               <div style="position: absolute;left: 400px; top: {{'965'}}px; z-index: 1;" class="customFont">{{$carbon->format('d/m/Y')}}.</div>
      </div>
    </div>
      </body>

        <?php }
        }else if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '1' && $r=='1'){
            if(!is_null($nombre)){
            $r='0';
             ?>

<div style="position: absolute;left: 650px; top: {{'710'}}px; z-index: 1; font-size:20;" class="customFont">{{$f->cantidad}}</div>
        <div style="position: absolute;left: 175px; top: 680px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CODIGO: '.$local->codigo}}.</div>
        <div style="position: absolute;left: 175px; top: 742px; z-index: 1; font-size:17; text-transform: uppercase;" class="customFont">{{$nombre->nombre}}.</div>
               
        
        <div style="position: absolute;left: 170px; top: {{'799'}}px; z-index: 1; text-transform: uppercase; font-size:16;" class="customFont">{{$letras}}.</div>
        <div style="position: absolute;left: 150px; top: {{'852'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CUOTA PARQUEO CORRESPONDIENTE AL MES'}}</div>
        <div style="position: absolute;left: 150px; top: {{'870'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</div>
        <div style="position: absolute;left: 400px; top: {{'965'}}px; z-index: 1;" class="customFont">{{$carbon->format('d/m/Y')}}.</div>
      </div>
    </div>
      </body>
        
        <?php }
        }else if($f->concepto == 'Parqueo' && $f->id_Condominio % 2 == '0' && $r=='0'){ 
            if(!is_null($nombre)){
            $r='1';
            ?>
            <body> 
                <div class="col-md-12">
                        <div class="box-header with-border">
            <div style="position: absolute;left: 650px; top: 127px; z-index: 1; font-size:20;" class="customFont">{{$f->cantidad}}</div>
            <div style="position: absolute;left: 175px; top: 100px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CODIGO: '.$local->codigo}}.</div>
            <div style="position: absolute;left: 175px; top: 170px; z-index: 1; font-size:17; text-transform: uppercase;" class="customFont">{{$nombre->nombre}}.</div>
           
    
            <div style="position: absolute;left: 170px; top: {{'224'}}px; z-index: 1; text-transform: uppercase; font-size:16;" class="customFont">{{$letras}}.</div>
            <div style="position: absolute;left: 150px; top: {{'267'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'CUOTA PARQUEO CORRESPONDIENTE AL MES'}}</div>
            <div style="position: absolute;left: 150px; top: {{'284'}}px; z-index: 1; text-transform: uppercase;" class="customFont">{{'DE: '.$mes->mes.' DEL AÑO : '.$mes->ano.', LOCAL: '.$local->NLocal}}.</div>
            <div style="position: absolute;left: 400px; top: {{'384'}}px; z-index: 1;" class="customFont">{{$carbon->format('d/m/Y')}}.</div>
            
        <?php }
        }
        ?>
        
    
  @endforeach
</html>