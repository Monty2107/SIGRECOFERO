<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
  protected $table = 'empresas';

  protected $fillable =[
    'nombre','id_Contacto','correo','telefonoFijo','telefonoMovil'
  ];

  public function condominio(){
    return $this->hasMany('\SIGRECOFERO\condominio', 'id_Condominio');
  }
}
