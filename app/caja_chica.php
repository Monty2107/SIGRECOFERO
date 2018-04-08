<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class caja_chica extends Model
{
  protected $table = 'caja_chicas';

  protected $fillable =[
    'estado','cantidad','concepto','id_Fecha'
  ];

  public function fecha(){
    return $this->hasMany('\SIGRECOFERO\fecha', 'id_Fecha');
  }
}
