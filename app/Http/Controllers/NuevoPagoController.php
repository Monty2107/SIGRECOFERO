<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Carbon\Carbon;
use SIGRECOFERO\condominio;
use SIGRECOFERO\fecha;
use SIGRECOFERO\estado;
use SIGRECOFERO\facturacion;
use SIGRECOFERO\empresa;

class NuevoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condomine = condominio::find($id);
        return view('admin.pago.create')->with('condomine',$condomine);
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
        // dd($request->descripcion);

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $mI= $request->anoI;
        $mF= $request->anoF;
        
        $fecha_detI= explode("-",$mI);
        $fecha_detF= explode("-",$mF);
        $validacion = $fecha_detF[0].(($fecha_detF[1]+1)-1);
        $validacion1 = $fecha_detF[0].$fecha_detF[1];
        $mesI = ($fecha_detI[1]+1)-1;
        $mesF = ($fecha_detF[1]+1)-1;
        $valI = $mesI;

        $fecha = fecha::create([
            'dia'=>$date->format('d'),
            'mes'=>$date->format('m'),
            'ano'=>$date->format('Y'),
          ]);

        $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
      '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
      '11'=>'Noviembre','12'=>'Diciembre' );

      for ($i=$fecha_detI[0]; $i <=$fecha_detF[0]  ; $i++) { 
          # code...
            
            for ($j=$mesI; $j <= 12 ; $j++) { 
                # code...  
                if($j ==12 || $j==11 || $j==10 ){
                    
                    if ($i.$j < $validacion1 ) {                
                        # code...            
                        $estado = estado::create([
                          'mes'=>$arrayMes[$j],
                          'ano'=>$i,
                          'estado'=>false,
                          'concepto'=>'Otros',
                          'descripcion'=>$request->descripcion,
                          'id_Condominio'=>$id,
                          'id_Fecha'=>$fecha->id,
                          ]);
          
                          facturacion::create([
                              'NFactura' => '',
                              'concepto'=> 'Otros',
                              'cantidad' => $request->cantidad,
                              'emision'=>'Emitido',
                              'mes'=>$arrayMes[$j],
                              'ano'=>$i,
                              'estado'=>false,
                              'id_Fecha'=>$fecha->id,
                              'id_Estado'=>$estado->id,
                              ]);
                    }else if( $i.$j == $validacion){
                        $estado = estado::create([
                            'mes'=>$arrayMes[$j],
                            'ano'=>$i,
                            'estado'=>false,
                            'concepto'=>'Otros',
                            'descripcion'=>$request->descripcion,
                            'id_Condominio'=>$id,
                            'id_Fecha'=>$fecha->id,
                            ]);
            
                            facturacion::create([
                                'NFactura' => '',
                                'concepto'=> 'Otros',
                                'cantidad' => $request->cantidad,
                                'emision'=>'No Emitido',
                                'mes'=>$arrayMes[$j],
                                'ano'=>$i,
                                'estado'=>false,
                                'id_Fecha'=>$fecha->id,
                                'id_Estado'=>$estado->id,
                                ]);
                    } 
                    if($j==12){
                        $mesI=1;
                    }
                }else{
                    if ($i.$j < $validacion ) {
                   
                        # code...            
                        $estado = estado::create([
                          'mes'=>$arrayMes[$j],
                          'ano'=>$i,
                          'estado'=>false,
                          'concepto'=>'Otros',
                          'descripcion'=>$request->descripcion,
                          'id_Condominio'=>$id,
                          'id_Fecha'=>$fecha->id,
                          ]);
          
                          facturacion::create([
                              'NFactura' => '',
                              'concepto'=> 'Otros',
                              'cantidad' => $request->cantidad,
                              'emision'=>'Emitido',
                              'mes'=>$arrayMes[$j],
                              'ano'=>$i,
                              'estado'=>false,
                              'id_Fecha'=>$fecha->id,
                              'id_Estado'=>$estado->id,
                              'id_Condominio'=>$id,
                              ]);
                    }else if($i.$j == $validacion){
                        $estado = estado::create([
                            'mes'=>$arrayMes[$j],
                            'ano'=>$i,
                            'estado'=>false,
                            'concepto'=>'Otros',
                            'descripcion'=>$request->descripcion,
                            'id_Condominio'=>$id,
                            'id_Fecha'=>$fecha->id,
                            ]);
            
                            facturacion::create([
                                'NFactura' => '',
                                'concepto'=> 'Otros',
                                'cantidad' => $request->cantidad,
                                'emision'=>'No Emitido',
                                'mes'=>$arrayMes[$j],
                                'ano'=>$i,
                                'estado'=>false,
                                'id_Fecha'=>$fecha->id,
                                'id_Estado'=>$estado->id,
                                'id_Condominio'=>$id,
                                ]);
                    }
                    
                    
                }  
                 
               
            }                         
      }

    $empresa = empresa::find($id);

          Session::flash('message','Nuevo Pago Registrado Exitosamente al Condomine: '.$empresa->nombre.'  
          ,Con concepto de : '.$request->descripcion );

          return redirect('/admin/buscarCondomine');
        

            
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
