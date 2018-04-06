<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class condominio extends Model
{
  protected $table = 'condominios';

  protected $fillable =[
    'codigo','NLocal','id_Empresa'
  ];

  public function empresas(){
    return $this->hasMany('\SIGRECOFERO\empresas', 'id_Empresa');
  }

  public function estados(){
    return $this->belongsTo('\SIGRECOFERO\estados', 'id_Estado');
  }
}
