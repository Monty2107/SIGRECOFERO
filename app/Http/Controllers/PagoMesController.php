<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SIGRECOFERO\condominio;
use SIGRECOFERO\estado;
use SIGRECOFERO\ingreso_diario;
use SIGRECOFERO\bitacora;
use PDF;

class PagoMesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        $ingreso_diario = ingreso_diario::all();
        return view('admin.pago.viewLiquidacion')->with('ingreso_diario',$ingreso_diario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingreso_diario = ingreso_diario::all();
        return view('admin.pago.viewReporte')->with('ingreso_diario',$ingreso_diario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idE = explode('-',$id);
            $ingreso_diario = ingreso_diario::find($idE[0]);
            $dato = explode(" ",(String)$ingreso_diario->created_at);
            $fecha = $dato[0];
            $hora = $dato[1];
            $datoFecha = explode("-",(String)$fecha);
            $fechaOrdenadas = $datoFecha[2]."-".$datoFecha[1]."-".$datoFecha[0];
            

        if($idE[1] == 1){
        
            $pdf = PDF::loadView('admin/pago/liquidacionPagos',['fechaOrdenadas' => $fechaOrdenadas]);
            $pdf->setpaper("A4", "landscape");// vertical: portrait, horinzontal: landscape
            return $pdf->stream();

        }else{
            bitacora::bitacoras('Descargar','descargo documento de liquidacion de pago diario');
            $pdf = PDF::loadView('admin/pago/liquidacionPagos',['fechaOrdenadas' => $fechaOrdenadas]);
            $pdf->setpaper("A4", "landscape");// vertical: portrait, horinzontal: landscape
            return $pdf->download('liquidacion_'.$fechaOrdenadas.'.pdf');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::User()->cargo == "Administracion"){
            $estado = estado::find($id);
      // dd($estado->all());
       return view('admin.pago.editMes')->with('estado', $estado);
        }else{
            return redirect('/');
        }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
