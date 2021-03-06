<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class ingreso_diario extends Model
{
  protected $table = 'ingreso_diarios';

  protected $fillable =[
    'concepto','formaPago','NCheque','NBanco','cantidad','descripcion','id_Fecha','id_Factura','id_Condominio'
  ];

  public function fecha(){
    return $this->hasMany('\SIGRECOFERO\fecha', 'id_Fecha');
  }

  public function condominio(){
    return $this->hasMany('\SIGRECOFERO\condominio', 'id_Condominio');
  }
}
