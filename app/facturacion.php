<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class facturacion extends Model
{
  protected $table = 'facturacions';

  protected $fillable =[
    'NFactura','concepto','cantidad','emision','id_Fecha','id_Estado','id_Condominio'
  ];

  public function fecha(){
    return $this->hasMany('\SIGRECOFERO\fechas', 'id_Fecha');
  }

  public function estado(){
    return $this->hasMany('\SIGRECOFERO\estado', 'id');
  }
  public function condominio(){
    return $this->hasMany('\SIGRECOFERO\condominio', 'id');
  }
  public function factura_anulada(){
    return $this->belongsTo('\SIGRECOFERO\factura_anuladas', 'id_Anular');
  }
}
