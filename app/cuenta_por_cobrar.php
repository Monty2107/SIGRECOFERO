<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class cuenta_por_cobrar extends Model
{
  protected $table = 'cuenta_por_cobrars';

  protected $fillable =[
    'mes','ano','id_Fecha','id_Factura'
  ];
  public function fechas(){
    return $this->hasMany('\SIGRECOFERO\fechas', 'id_Fecha');
  }

  public function facturacions(){
    return $this->hasMany('\SIGRECOFERO\facturacions', 'id_Factura');
  }
}
