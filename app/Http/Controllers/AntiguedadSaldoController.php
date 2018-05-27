<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use PDF;
use Carbon\Carbon;
use SIGRECOFERO\AntiguedadSaldo;
use SIGRECOFERO\condominio;
use SIGRECOFERO\bitacora;
use SIGRECOFERO\Http\Requests\saldoAntiguoRequest;

class AntiguedadSaldoController extends Controller
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
        $condominiobusqueda = condominio::with('empresa')->orderBy('id','desc')->get();
      return view('admin.pago.viewSaldoAntiguo')->with('condominiobusqueda',$condominiobusqueda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saldoAntiguoRequest $request)
    {


        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $count = count($request->seleccionar);
        $arrayCondominio = $request->seleccionar;
        $fechaInicio = $request->fechaInicial;
        $fechaFinal = $request->fechaFinal;

        bitacora::bitacoras('Descarga','Saldos Antiguos');
        $pdf = PDF::loadView('admin/pago/viewReporteSaldoAntiguos',['arrayCondominio' => $arrayCondominio, 'fechaInicio'=>$fechaInicio, 'fechaFinal'=>$fechaFinal]);
        $pdf->setpaper('A4','portrait');// vertical: portrait, horinzontal: landscape
        return $pdf->download('Saldo_Antiguo_de:'.$fechaInicio.'_hasta_'.$fechaFinal.'.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
