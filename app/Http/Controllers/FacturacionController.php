<?php

namespace SIGRECOFERO\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use SIGRECOFERO\condominio;
use SIGRECOFERO\facturacion;
use SIGRECOFERO\estado;
use SIGRECOFERO\empresa;
use Carbon\Carbon;
use PDF;

class FacturacionController extends Controller
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
        $condomine = condominio::with('estado')->get();
        return view('admin.facturacion.create')->with('condomine', $condomine);
    }

    public function buscar()
    {
        $condomine = condominio::with('estado')->get();
        return view('admin.facturacion.buscar')->with('condomine', $condomine);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->format('m')+1;
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );

            $facturas = facturacion::where('mes','=',$arrayMes[$m])->where('emision','=','No Emitido')->get();

        $pdf = PDF::loadView('admin/facturacion/facturasAll',['facturas' => $facturas]);
        return $pdf->stream();
    }
    public function create2()
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->format('m')+1;
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m])->where('concepto','=','Administrativo')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $pdf = PDF::loadView('admin/facturacion/facturasAdmin',['facturas' => $facturas]);
        return $pdf->stream();
    }

    public function create3()
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->format('m')+1;
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m])->where('concepto','=','Parqueo')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $pdf = PDF::loadView('admin/facturacion/facturasParqueo',['facturas' => $facturas]);
        return $pdf->stream();
    }

    public function create4()
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->format('m')+1;
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m])->where('concepto','=','Otros')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $pdf = PDF::loadView('admin/facturacion/facturasOtros',['facturas' => $facturas]);
        return $pdf->stream();
    }

    public function create5($id)
    {
    
            $facturas = facturacion::find($id);
            $pdf = PDF::loadView('admin/facturacion/facturaIndividual',['facturas' => $facturas]);
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
        $val = explode('-',$id);
        if ($val[1]== 1) {

            $factura = facturacion::find($val[0]);
            return view('admin.facturacion.anular')->with('factura',$factura);

        }else if($val[1]== 2){

        $factura = facturacion::find($val[0]);
        $condomine = condominio::find($factura->id_Condominio);
        return view('admin.facturacion.edit')->with('condomine',$condomine);       

        }else{

        $condominio = condominio::find($id);
        return view('admin.facturacion.show')->with('condominio',$condominio);

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
