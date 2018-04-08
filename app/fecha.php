<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class fecha extends Model
{
  protected $table = 'fechas';

  protected $fillable =[
    'dia','mes','ano'
  ];

  public function facturacion(){
    return $this->belongsTo('\SIGRECOFERO\facturacion', 'id_Factura');
  }
  public function ingreso_diario(){
    return $this->belongsTo('\SIGRECOFERO\ingreso_diario', 'id_Ingreso');
  }

  public function caja_chica(){
    return $this->belongsTo('\SIGRECOFERO\caja_chica', 'id_Caja');
  }
}
