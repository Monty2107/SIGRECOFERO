<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class facturacion extends Model
{
  protected $table = 'facturacions';

  protected $fillable =[
    'NFactura','concepto','cantidad','id_Fecha','id_Estado'
  ];

  public function fecha(){
    return $this->hasMany('\SIGRECOFERO\fechas', 'id_Fecha');
  }

  public function estado(){
    return $this->hasMany('\SIGRECOFERO\estados', 'id_Estado');
  }
  public function factura_anulada(){
    return $this->belongsTo('\SIGRECOFERO\factura_anuladas', 'id_Anular');
  }
}
