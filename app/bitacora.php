<?php

namespace SIGRECOFERO;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class bitacora extends Model
{
    protected $table = 'bitacora';
    
    protected $fillable = [
        'accion_Bit','comentario_Bit','id_Usuario'
    ];

	public static function bitacoras($accion_Bit,$comentario_Bit){

	   if (Auth::check()==1) {
	   	bitacora::create([
	   		'accion_Bit'=>$accion_Bit,
	   		'comentario_Bit'=>$comentario_Bit,
               'id_Usuario'=>Auth::User()->id,
               ]);
	   	# code...
	   }

	}
}
