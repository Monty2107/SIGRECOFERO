<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
  protected $table = 'contactos';

  protected $fillable =[
    'correo','telefonoFijo','telefonoMovil'
  ];

  public function empresas(){
    return $this->belongsTo('\SIGRECOFERO\empresas', 'id_Empresa');
  }
}
