<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class factura_anulada extends Model
{
  protected $table = 'factura_anuladas';

  protected $fillable =[
    'desripcion','id_Factura'
  ];

  public function facturacions(){
    return $this->hasMany('\SIGRECOFERO\facturacions', 'id_Factura');
}
