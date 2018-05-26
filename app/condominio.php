<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class condominio extends Model
{
  protected $table = 'condominios';

  protected $fillable =[
    'codigo','NLocal','nombre','observaciones','id_Empresa'
  ];

  public function empresa(){
    return $this->belongsTo('\SIGRECOFERO\empresa', 'id');
  }

  public function ingreso_diario(){
    return $this->belongsTo('\SIGRECOFERO\ingreso_diario', 'id_Ingreso');
  }
  public function estado(){
    return $this->belongsTo('\SIGRECOFERO\estado', 'id_Estado');
  }
  public function facturacion(){
    return $this->BelongsTo('\SIGRECOFERO\condominio', 'id');
  }

  public function AntiguedadSaldo(){
    return $this->hasMany('\SIGRECOFERO\AntiguedadSaldo', 'id_AntiguedadSaldo');
  }
}
