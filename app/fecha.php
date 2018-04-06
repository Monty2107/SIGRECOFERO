<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class fecha extends Model
{
  protected $table = 'fechas';

  protected $fillable =[
    'dia','mes','ano'
  ];

  public function facturacions(){
    return $this->belongsTo('\SIGRECOFERO\facturacions', 'id_Factura');
  }
  public function ingreso_diarios(){
    return $this->belongsTo('\SIGRECOFERO\ingreso_diarios', 'id_Ingreso');
  }

  public function caja_chicas(){
    return $this->belongsTo('\SIGRECOFERO\caja_chicas', 'id_Caja');
  }
}
