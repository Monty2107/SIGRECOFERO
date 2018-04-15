<?php

$q=$_POST['q'];
$busquedas = \SIGRECOFERO\estado::where('id_Condominio',$condomine->id)->where('ano','=',$i)->get();
$array[]=$busquedas->ano;

?>


{!!Form::select('anoPago',$array, null, ['onchange'=>'load(this.value)','class'=>'form-control','placeholder' => 'Seleccione el Año....'])!!}
