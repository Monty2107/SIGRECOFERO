<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class ingreso_diario extends Model
{
  protected $table = 'ingreso_diarios';

  protected $fillable =[
    'concepto','formaPago','NCheque','cantidad','descripcion','id_Fecha','id_Estado'
  ];

  public function fechas(){
    return $this->hasMany('\SIGRECOFERO\fechas', 'id_Fecha');
  }

  public function estados(){
    return $this->belongsTo('\SIGRECOFERO\estados', 'id_Estado');
  }
}
