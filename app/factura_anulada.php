<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class factura_anulada extends Model
{
  protected $table = 'factura_anuladas';

  protected $fillable =[
    'desripcion','id_Factura'
  ];

  public function facturacion(){
    return $this->hasMany('\SIGRECOFERO\facturacion', 'id_Factura');
}
