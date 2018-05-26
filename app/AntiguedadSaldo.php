<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class AntiguedadSaldo extends Model
{
    protected $table = 'AntiguedadSaldo';

    protected $fillable =[
        'estado','cantidad','concepto','id_Condominio','id_Fecha'
      ];
    
      public function fecha(){
        return $this->hasMany('\SIGRECOFERO\fecha', 'id_Fecha');
      }
}
