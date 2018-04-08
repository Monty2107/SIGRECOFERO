<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
  protected $table = 'estados';

  protected $fillable =[
    'mes','ano','estado','id_Condominio'
  ];

  public function condominios(){
    return $this->hasMany('\SIGRECOFERO\condominio', 'id_Condominio');
  }

  public function facturacions(){
    return $this->belongsTo('\SIGRECOFERO\facturacion', 'id_Factura');
  }
  public function ingreso_diarios(){
    return $this->belongsTo('\SIGRECOFERO\ingreso_diario', 'id_Ingreso');
  }
}
