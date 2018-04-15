<?php

$q=$_POST['q'];
$busquedas = \SIGRECOFERO\estado::where('id_Condominio',$condomine->id)->where('ano','=',$i)->get();
$array[]=$busquedas->ano;

?>

<select class="" name="">
  <option value="[object Object]">Seleccione algo</option>
</select>
