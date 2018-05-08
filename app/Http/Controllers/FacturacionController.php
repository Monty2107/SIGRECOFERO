<?php

namespace SIGRECOFERO\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use SIGRECOFERO\condominio;
use SIGRECOFERO\facturacion;
use SIGRECOFERO\estado;
use SIGRECOFERO\empresa;
use PDF;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condomine = condominio::with('estado')->get();
        return view('admin.facturacion.create')->with('condomine', $condomine);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $facturas = facturacion::where('emision','=','No Emitido')->get();
        $empresas = empresa::all();
        $count = count($empresas);

        $pdf = PDF::loadView('admin/facturacion/facturasAll',['facturas' => $facturas]);
        return $pdf->stream();
    }
    public function create2()
    {
        $facturas = facturacion::where('concepto','=','Administrativo')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $pdf = PDF::loadView('admin/facturacion/facturasAdmin',['facturas' => $facturas]);
        return $pdf->stream();
    }

    public function create3()
    {
        $facturas = facturacion::where('concepto','=','Parqueo')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $pdf = PDF::loadView('admin/facturacion/facturasParqueo',['facturas' => $facturas]);
        return $pdf->stream();
    }

    public function create4()
    {
        $facturas = facturacion::where('concepto','=','Otros')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $pdf = PDF::loadView('admin/facturacion/facturasOtros',['facturas' => $facturas]);
        return $pdf->stream();
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
        $condominio = condominio::find($id);
        return view('admin.facturacion.show')->with('condominio',$condominio);
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
