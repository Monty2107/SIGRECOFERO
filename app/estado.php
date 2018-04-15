<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
  protected $table = 'estados';

  protected $fillable =[
    'mes','ano','estado','concepto','id_Condominio'
  ];

  public function condominio(){
    return $this->hasMany('\SIGRECOFERO\condominio', 'id_Condominio');
  }

  public function facturacions(){
    return $this->belongsTo('\SIGRECOFERO\facturacion', 'id_Factura');
  }

}
