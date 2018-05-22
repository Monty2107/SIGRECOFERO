<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\Auth;
use SIGRECOFERO\cuenta_por_cobrar;
use Carbon\Carbon;
use Dompdf\Dompdf;
use PDF;

class Cuenta_por_CobrarController extends Controller
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
        $cuenta = cuenta_por_cobrar::all();
        return view('admin/facturacion/cuenta_por_cobrar')->with('cuenta',$cuenta);
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
        $cuenta = cuenta_por_cobrar::find($id);
        $pdf = PDF::loadView('admin/facturacion/cuentasPorCobrar',['cuenta' => $cuenta]);
        $pdf->setpaper('A4','portrait');// vertical: portrait, horinzontal: landscape
        return $pdf->stream('Cuenta_por_cobrar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $cuenta = cuenta_por_cobrar::find($id);
        $pdf = PDF::loadView('admin/facturacion/cuentasPorCobrar',['cuenta' => $cuenta]);
        $pdf->setpaper('A4','portrait');// vertical: portrait, horinzontal: landscape
        return $pdf->download('Cuenta_Por_Cobrar'.' Generado el : '.$date->format('d/m/Y').'.pdf');
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
