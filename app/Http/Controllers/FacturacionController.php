<?php

namespace SIGRECOFERO\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SIGRECOFERO\condominio;
use SIGRECOFERO\facturacion;
use SIGRECOFERO\factura_anulada;
use SIGRECOFERO\cuenta_por_cobrar;
use SIGRECOFERO\estado;
use SIGRECOFERO\empresa;
use SIGRECOFERO\bitacora;
use SIGRECOFERO\fecha;
use SIGRECOFERO\saldo;
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
        if(Auth::User()->cargo == "Financiero"){
            $condomine = condominio::with('estado')->get();
            return view('admin.facturacion.create')->with('condomine', $condomine);
        }else{
            return redirect('/');
        }
        
    }
    public function index2()
    {
        if(Auth::User()->cargo == "Administracion"){
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
        if(Auth::User()->cargo == "Financiero"){
           
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->addMonth(1);

        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );

        $facturas = facturacion::where('mes','=',$arrayMes[$m->month])->where('emision','=','No Emitido')->get();
        $date1 = $carbon->now();
        $mese=$date1->addMonth(2);
        $countF = count($facturas);
        $jDate = ($mese->month +'1')-'1';
        $fecha = fecha::create([
            'dia'=>$date->format('d'),
            'mes'=>$date->format('m'),
            'ano'=>$date->format('Y'),
          ]);
        for ($i=0; $i < $countF ; $i++) { 
            $facturas[$i]->emision = 'Emitido';
            $facturas[$i]->save();
            

            $estado = estado::create([
                'mes'=>$arrayMes[$jDate],
                'ano'=>$date1->format('Y'),
                'estado'=>false,
                'concepto'=>$facturas[$i]->concepto,
                'id_Condominio'=>$facturas[$i]->id_Condominio,
                'id_Fecha'=>$fecha->id,
                ]);
            
           facturacion::create([
                'NFactura' => '',
                'concepto'=> $facturas[$i]->concepto,
                'cantidad' => $facturas[$i]->cantidad,
                'emision'=>'No Emitido',
                'mes'=>$arrayMes[$jDate],
                'ano'=>$mese->year,
                'estado'=>false,
                'id_Fecha'=>$fecha->id,
                'id_Estado'=>$estado->id,
                'id_Condominio'=>$facturas[$i]->id_Condominio,
                ]);

                $antiguedad = saldo::create([
                    'estado'=>'Deudas',
                    'cantidad'=>$facturas[$i]->cantidad,
                    'concepto'=>$facturas[$i]->concepto,
                    'id_Condominio'=>$facturas[$i]->id_Condominio,
                    'id_Fecha'=>$facturas[$i]->id_Fecha,
                    ]);

        }
        //$fati = facturacion::where('emision','=','No Emitido')->get();
        cuenta_por_cobrar::create([
            'mes'=>$arrayMes[$m->month],
            'ano'=>$date->format('Y'),
            'concepto'=>'Todas',
            'id_Fecha'=>$fecha->id,
        ]);

        bitacora::bitacoras('Emision','Emision de Facturas  de Todos los Condominio');
        $pdf = PDF::loadView('admin/facturacion/facturasAll',['facturas' => $facturas]);
        $pdf->setpaper('A4','portrait');// vertical: portrait, horinzontal: landscape
        return $pdf->stream('Factura_Todas');
    }else{
        return redirect('/');
    }
    }
    public function create2()
    {
        if(Auth::User()->cargo == "Financiero"){
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->addMonth(1);
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m->month])->where('concepto','=','Administrativo')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $date1 = $carbon->now();
        $mese=$date1->addMonth(2);
        $countF = count($facturas);
        $jDate = ($mese->month +'1')-'1';
        $fecha = fecha::create([
            'dia'=>$date->format('d'),
            'mes'=>$date->format('m'),
            'ano'=>$date->format('Y'),
          ]);
        for ($i=0; $i < $countF ; $i++) { 
            $facturas[$i]->emision = 'Emitido';
            $facturas[$i]->save();
           
            $estado = estado::create([
                'mes'=>$arrayMes[$jDate],
                'ano'=>$date1->format('Y'),
                'estado'=>false,
                'concepto'=>$facturas[$i]->concepto,
                'id_Condominio'=>$facturas[$i]->id_Condominio,
                'id_Fecha'=>$fecha->id,
                ]);
            
                facturacion::create([
                'NFactura' => '',
                'concepto'=> $facturas[$i]->concepto,
                'cantidad' => $facturas[$i]->cantidad,
                'emision'=>'No Emitido',
                'mes'=>$arrayMes[$jDate],
                'ano'=>$mese->year,
                'estado'=>false,
                'id_Fecha'=>$fecha->id,
                'id_Estado'=>$estado->id,
                'id_Condominio'=>$facturas[$i]->id_Condominio,
                ]);

                $antiguedad = saldo::create([
                    'estado'=>'Deudas',
                    'cantidad'=>$facturas[$i]->cantidad,
                    'concepto'=>$facturas[$i]->concepto,
                    'id_Condominio'=>$facturas[$i]->id_Condominio,
                    'id_Fecha'=>$facturas[$i]->id_Fecha,
                    ]);

        }
        //$fati = facturacion::all()->last();
        cuenta_por_cobrar::create([
            'mes'=>$arrayMes[$m->month],
            'ano'=>$date->format('Y'),
            'concepto'=>'Administrativo',
            'id_Fecha'=>$fecha->id,
        ]);
        bitacora::bitacoras('Emision','Emision de Facturas  de Administracion de Todos los Condominio');
        $pdf = PDF::loadView('admin/facturacion/facturasAdmin',['facturas' => $facturas]);
        $pdf->setpaper("A4", "portrait");// vertical: portrait, horinzontal: landscape
        return $pdf->stream('Factura_Administrativo');
    }else{
        return redirect('/');
    }
    }

    public function create3()
    {
        if(Auth::User()->cargo == "Financiero"){
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->addMonth(1);
        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m->month])->where('concepto','=','Parqueo')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $date1 = $carbon->now();
        $mese=$date1->addMonth(2);
        $countF = count($facturas);
        $jDate = ($mese->month +'1')-'1';
        $fecha = fecha::create([
            'dia'=>$date->format('d'),
            'mes'=>$date->format('m'),
            'ano'=>$date->format('Y'),
          ]);
        for ($i=0; $i < $countF ; $i++) { 
            $facturas[$i]->emision = 'Emitido';
            $facturas[$i]->save();
            
            $estado = estado::create([
                'mes'=>$arrayMes[$jDate],
                'ano'=>$date1->format('Y'),
                'estado'=>false,
                'concepto'=>$facturas[$i]->concepto,
                'id_Condominio'=>$facturas[$i]->id_Condominio,
                'id_Fecha'=>$fecha->id,
                ]);
            
             facturacion::create([
                'NFactura' => '',
                'concepto'=> $facturas[$i]->concepto,
                'cantidad' => $facturas[$i]->cantidad,
                'emision'=>'No Emitido',
                'mes'=>$arrayMes[$jDate],
                'ano'=>$mese->year,
                'estado'=>false,
                'id_Fecha'=>$fecha->id,
                'id_Estado'=>$estado->id,
                'id_Condominio'=>$facturas[$i]->id_Condominio,
                ]);

                $antiguedad = saldo::create([
                    'estado'=>'Deudas',
                    'cantidad'=>$facturas[$i]->cantidad,
                    'concepto'=>$facturas[$i]->concepto,
                    'id_Condominio'=>$facturas[$i]->id_Condominio,
                    'id_Fecha'=>$facturas[$i]->id_Fecha,
                    ]);
                
        }
        //$fati = facturacion::last();
        
        cuenta_por_cobrar::create([
            'mes'=>$arrayMes[$m->month],
            'ano'=>$date->format('Y'),
            'concepto'=>'Parqueo',
            'id_Fecha'=>$fecha->id,
        ]); 

        
        bitacora::bitacoras('Emision','Emision de Facturas  de Parqueo de Todos los Condominio');
        $pdf = PDF::loadView('admin/facturacion/facturasParqueo',['facturas' => $facturas]);
        $pdf->setpaper("A4", "portrait");// vertical: portrait, horinzontal: landscape
        return $pdf->stream('Factura_Parqueo');
    }else{
        return redirect('/');
    }
    }

    public function create4()
    {
        if(Auth::User()->cargo == "Financiero"){
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $m = $date->addMonth(1);

        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
        '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
        '11'=>'Noviembre','12'=>'Diciembre' );
        $facturas = facturacion::where('mes','=',$arrayMes[$m->month])->where('concepto','=','Otros')->where('emision','=','No Emitido')->get();
        // dd($facturas);
        $countF = count($facturas);
        $fecha = fecha::create([
            'dia'=>$date->format('d'),
            'mes'=>$date->format('m'),
            'ano'=>$date->format('Y'),
          ]);
        for ($i=0; $i < $countF ; $i++) { 
            $facturas[$i]->emision = 'Emitido';
            $facturas[$i]->save();
        }

        cuenta_por_cobrar::create([
            'mes'=>$arrayMes[$m->month],
            'ano'=>$date->format('Y'),
            'concepto'=>'Otros',
            'id_Fecha'=>$facturas[0]->id_Fecha,
        ]);

        

        bitacora::bitacoras('Emision','Emision de Facturas  de Otros Pagos');
        $pdf = PDF::loadView('admin/facturacion/facturasOtros',['facturas' => $facturas]);
        $pdf->setpaper("A4", "portrait");// vertical: portrait, horinzontal: landscape
        return $pdf->stream('Factura_Otros_Pagos');
    }else{
        return redirect('/');
    }
    }

    public function create5($id)
    {
        if(Auth::User()->cargo == "Financiero"){
            $facturas = facturacion::find($id);
            $facturas->emision = 'Emitido';
            $facturas->save();

            

            bitacora::bitacoras('Emision','Emision de Factura  Anulada');
            $pdf = PDF::loadView('admin/facturacion/facturaIndividual',['facturas' => $facturas]);
            $pdf->setpaper("A4", "portrait");// vertical: portrait, horinzontal: landscape
            return $pdf->stream('Factura_Anuladas');

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
            $condominio = condominio::find($val[2]);
            return view('admin.facturacion.anular')->with('factura',$factura)->with('condominio',$condominio);

        }else if($val[1]== 2){

        $factura = facturacion::find($val[0]);
        $condomine = condominio::find($factura->id_Condominio);
        return view('admin.facturacion.edit')->with('condomine',$condomine);       

        }else if($val[1]== 3){
            $condominio = condominio::find($val[2]);
        return view('admin.facturacion.show')->with('condominio',$condominio);
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
        $factura = facturacion::find($id);
        $explo = explode('-',$factura->permiso);
                $factura->emision = 'Anulado He Imprimir';
                $factura->permiso = '1'.'-'.$explo[1].'-'.Auth::User()->id;
                $factura->save();

        $condominio = condominio::find($factura->id_Condominio);
        bitacora::bitacoras('Permiso',Auth::User()->cargo.' Dio Permiso Correspondiente a la Anulacion');
        Session::flash('message','Factura del Mes: '.$factura->mes.' Del Año: '.
        $factura->ano.' Del Condominio: '.$condominio->empresa->nombre.' Con Local N° '.
        $condominio->NLocal.' Fue Dado Su Permiso Correctamente!!');

        return redirect()->back();
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


        $factura_anulada = factura_anulada::create([
            'descripcion' => $request->descripcion,
            'id_Factura'=> $id,
            ]);

            if($request->emision == "Imprimir"){
                // 0 = Pide Permiso 1- Dio Permiso 2- Ya se anulo
                $factura = facturacion::find($id);
                $factura->emision = 'Anulado';
                $factura->permiso = '2'.'-'.$factura_anulada->id.'-'.Auth::User()->id;
                $factura->save();

                
                facturacion::create([
                    'NFactura' => '',
                    'concepto'=> $factura->concepto,
                    'cantidad' => $factura->cantidad,
                    'emision'=>'Anulado He Imprimir',
                    'permiso'=>'0'.'-'.$factura_anulada->id.'-'.Auth::User()->id,
                    'mes'=>$factura->mes,
                    'ano'=>$factura->ano,
                    'estado'=>$factura->estado,
                    'id_Fecha'=>$factura->id_Fecha,
                    'id_Estado'=>$factura->id_Estado,
                    'id_Condominio'=>$factura->id_Condominio,
                    ]);

            }else{

                $factura = facturacion::find($id);
                $factura->emision = 'Anulado';
                $factura->save();

            }

        $condominio = condominio::find($factura->id_Condominio);

        bitacora::bitacoras('Anulacion','Factura del mes de: '.$factura->mes.
        'del condomine '.$condominio->empresa->nombre.' Anulado');
        Session::flash('message','Factura del Mes: '.$factura->mes.' Del Año: '.
        $factura->ano.' Del Condominio: '.$condominio->empresa->nombre.' Con Local N° '.
        $condominio->NLocal.' Fue Anulado Correctamente!!'); 
        return view('admin.facturacion.show')->with('condominio',$condominio);

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
