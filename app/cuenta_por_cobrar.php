<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class cuenta_por_cobrar extends Model
{
  protected $table = 'cuenta_por_cobrars';

  protected $fillable =[
    'mes','ano','id_Fecha','id_Factura'
  ];
  public function fecha(){
    return $this->hasMany('\SIGRECOFERO\fecha', 'id_Fecha');
  }

  public function facturacion(){
    return $this->hasMany('\SIGRECOFERO\facturacion', 'id_Factura');
  }
}
