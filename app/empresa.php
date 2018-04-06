<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
  protected $table = 'empresas';

  protected $fillable =[
    'nombre','id_Contacto'
  ];

  public function contactos(){
    return $this->hasMany('\SIGRECOFERO\contactos', 'id_Contacto');
  }
  public function condominios(){
    return $this->belongsTo('\SIGRECOFERO\condominios', 'id_Condominio');
  }
}
