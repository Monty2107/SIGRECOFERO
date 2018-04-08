<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class ingreso_diario extends Model
{
  protected $table = 'ingreso_diarios';

  protected $fillable =[
    'concepto','formaPago','NCheque','cantidad','descripcion','id_Fecha','id_Estado'
  ];

  public function fecha(){
    return $this->hasMany('\SIGRECOFERO\fecha', 'id_Fecha');
  }

  public function estado(){
    return $this->belongsTo('\SIGRECOFERO\estado', 'id_Estado');
  }
}
