<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
  protected $table = 'estados';

  protected $fillable =[
    'mes','ano','estado','concepto','descripcion','id_Condominio','id_Fecha'
  ];

  public function condominio(){
    return $this->hasMany('\SIGRECOFERO\condominio', 'id_Condominio');
  }

  public function facturacions(){
    return $this->belongsTo('\SIGRECOFERO\facturacion', 'id_Factura');
  }

  public function fecha(){
    return $this->hasMany('\SIGRECOFERO\fechas', 'id_Fecha');
  }

  public static function mesesAdmin($id){

    $val = explode("-",$id);

    return \SIGRECOFERO\estado::where('id_Condominio','=',$val['1'])->where('concepto','=','Administrativo')->where('ano','=',$val['0'])->where('estado','=',0)->get();
  }

  public static function mesesParqueo($id){

    $val = explode("-",$id);

    return \SIGRECOFERO\estado::where('id_Condominio','=',$val['1'])->where('concepto','=','Parqueo')->where('ano','=',$val['0'])->where('estado','=',0)->get();
  }

}
