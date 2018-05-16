<?php

namespace SIGRECOFERO\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SIGRECOFERO\condominio;
use SIGRECOFERO\facturacion;
use SIGRECOFERO\estado;
use SIGRECOFERO\empresa;
use Carbon\Carbon;
use Dompdf\Dompdf;
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
        if(Auth::User()->cargo == "Financiero" || Auth::User()->cargo == "Programador"){
            $condomine = condominio::with('estado')->get();
            return view('admin.facturacion.create')->with('condomine', $condomine);
        }else{
            return redirect('/');
        }
        
    }
    public function index2()
    {
        if(Auth::User()->cargo == "Administracion" || Auth::User()->cargo == "Programador"){
            $condomine = condominio::with('estado')->get();
            return view('admin.facturacion.create2')->with('condomine', $condomine);
        }else{
            return redirect('/');
        }
        
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
        if(Auth::User()->cargo == "Programador" || Auth::User()->cargo == "Financiero"){

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->format('m')+1;
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );

        $facturas = facturacion::where('mes','=',$arrayMes[$m])->where('emision','=','No Emitido')->get();
        $mese=$date->addMonth(2);
        $countF = count($facturas);
        $jDate = ($mese->month +'1')-'1';
        // for ($i=0; $i < $countF ; $i++) { 
        //     $facturas[$i]->emision = 'Emitido';
        //     $facturas[$i]->save();
            
        //     facturacion::create([
        //         'NFactura' => '',
        //         'concepto'=> $facturas[$i]->concepto,
        //         'cantidad' => $facturas[$i]->cantidad,
        //         'emision'=>'No Emitido',
        //         'mes'=>$arrayMes[$jDate],
        //         'ano'=>$mese->year,
        //         'estado'=>false,
        //         'id_Fecha'=>$facturas[$i]->id_Fecha,
        //         'id_Estado'=>$facturas[$i]->id_Estado,
        //         'id_Condominio'=>$facturas[$i]->id_Condominio,
        //         ]);
        // }

        
        $pdf = PDF::loadView('admin/facturacion/facturasAll',['facturas' => $facturas]);
        $pdf->setpaper('A4','portrait');// vertical: portrait, horinzontal: landscape
        return $pdf->stream();
    }else{
        return redirect('/');
    }
    }
    public function create2()
    {
        if(Auth::User()->cargo == "Programador" || Auth::User()->cargo == "Financiero"){
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->format('m')+1;
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m])->where('concepto','=','Administrativo')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $mese=$date->addMonth(2);
        $countF = count($facturas);
        $jDate = ($mese->month +'1')-'1';
        for ($i=0; $i < $countF ; $i++) { 
            $facturas[$i]->emision = 'Emitido';
            $facturas[$i]->save();
            
            facturacion::create([
                'NFactura' => '',
                'concepto'=> $facturas[$i]->concepto,
                'cantidad' => $facturas[$i]->cantidad,
                'emision'=>'No Emitido',
                'mes'=>$arrayMes[$jDate],
                'ano'=>$mese->year,
                'estado'=>false,
                'id_Fecha'=>$facturas[$i]->id_Fecha,
                'id_Estado'=>$facturas[$i]->id_Estado,
                'id_Condominio'=>$facturas[$i]->id_Condominio,
                ]);
        }
        $pdf = PDF::loadView('admin/facturacion/facturasAdmin',['facturas' => $facturas]);
        $pdf->setpaper("A4", "portrait");// vertical: portrait, horinzontal: landscape
        return $pdf->stream();
    }else{
        return redirect('/');
    }
    }

    public function create3()
    {
        if(Auth::User()->cargo == "Programador" || Auth::User()->cargo == "Financiero"){
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->format('m')+1;
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m])->where('concepto','=','Parqueo')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $mese=$date->addMonth(2);
        $countF = count($facturas);
        $jDate = ($mese->month +'1')-'1';
        for ($i=0; $i < $countF ; $i++) { 
            $facturas[$i]->emision = 'Emitido';
            $facturas[$i]->save();
            
            facturacion::create([
                'NFactura' => '',
                'concepto'=> $facturas[$i]->concepto,
                'cantidad' => $facturas[$i]->cantidad,
                'emision'=>'No Emitido',
                'mes'=>$arrayMes[$jDate],
                'ano'=>$mese->year,
                'estado'=>false,
                'id_Fecha'=>$facturas[$i]->id_Fecha,
                'id_Estado'=>$facturas[$i]->id_Estado,
                'id_Condominio'=>$facturas[$i]->id_Condominio,
                ]);
        }
        $pdf = PDF::loadView('admin/facturacion/facturasParqueo',['facturas' => $facturas]);
        $pdf->setpaper("A4", "portrait");// vertical: portrait, horinzontal: landscape
        return $pdf->stream();
    }else{
        return redirect('/');
    }
    }

    public function create4()
    {
        if(Auth::User()->cargo == "Programador" || Auth::User()->cargo == "Financiero"){
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->format('m')+1;
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m])->where('concepto','=','Otros')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $countF = count($facturas);
        for ($i=0; $i < $countF ; $i++) { 
            $facturas[$i]->emision = 'Emitido';
            $facturas[$i]->save();
        }

        $pdf = PDF::loadView('admin/facturacion/facturasOtros',['facturas' => $facturas]);
        $pdf->setpaper("A4", "portrait");// vertical: portrait, horinzontal: landscape
        return $pdf->stream();
    }else{
        return redirect('/');
    }
    }

    public function create5($id)
    {
        if(Auth::User()->cargo == "Programador" || Auth::User()->cargo == "Financiero"){
            $facturas = facturacion::find($id);
            $pdf = PDF::loadView('admin/facturacion/facturaIndividual',['facturas' => $facturas]);
            $pdf->setpaper("A4", "portrait");// vertical: portrait, horinzontal: landscape
            return $pdf->stream();
        }else{
            return redirect('/');
        }
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
