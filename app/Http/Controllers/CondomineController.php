<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use SIGRECOFERO\contacto;
use SIGRECOFERO\condominio;
use SIGRECOFERO\empresa;
use SIGRECOFERO\ingreso_diario;
use SIGRECOFERO\estado;
use SIGRECOFERO\fecha;
use SIGRECOFERO\facturacion;
use Carbon\Carbon;

class CondomineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(){
      $condominiobusqueda = condominio::with('empresa')->orderBy('id','desc')->get();
      return view('admin.condominio.buscar')->with('condominiobusqueda',$condominiobusqueda);
    }
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('admin.condominio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());

      // dd(empty($request->cantidadAdmin));
      $carbon = new \Carbon\Carbon();
      $date = $carbon->now();
      $empresa = empresa::create([
        'nombre'=>$request->nombre,
        'correo' => $request->correo,
        'telefonoFijo'=>$request->telefonoFijo,
        'telefonoMovil'=>$request->telefonoMovil,
      ]);

      condominio::create([
        'codigo'=>$request->codigo,
        'NLocal'=>$request->NLocal,
        'id_Empresa'=>$empresa->id,
      ]);

      $ano  = $request->facturacion;
      $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
      '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
      '11'=>'Noviembre','12'=>'Diciembre' );
      $cantMes=count($arrayMes);
      $concepto = count($request->opciones);

        $fecha = fecha::create([
          'dia'=>$date->format('d'),
          'mes'=>$date->format('m'),
          'ano'=>$date->format('Y'),
        ]);
        $m = $date->format('m');
        for ($i=$ano; $i <= $date->year ; $i++) {
          for ($k=1; $k <= $concepto ; $k++) {
            $l=$k-1;
          for ($j=1; $j <=$cantMes ; $j++) {
            if ($arrayMes[$m+1] == $arrayMes[$j] && $ano == $date->year) {
              
              $estado = estado::create([
                'mes'=>$arrayMes[$j],
                'ano'=>$ano,
                'estado'=>false,
                'concepto'=>$request->opciones[$l],
                'id_Condominio'=>$empresa->id,
                'id_Fecha'=>$fecha->id,
                ]);
                
                if ($request->opciones[$l] == 'Administrativo') {
                  # code...
                  if(empty($request->cantidadAdmin)){
                    facturacion::create([
                      'NFactura' => '',
                      'concepto'=> $request->opciones[$l],
                      'cantidad' => 50,
                      'emision'=>'No Emitido',
                      'mes'=>$arrayMes[$j],
                      'ano'=>$ano,
                      'estado'=>false,
                      'id_Fecha'=>$fecha->id,
                      'id_Estado'=>$estado->id,
                      'id_Condominio'=>$empresa->id,
                      ]);
                  }else{
                    
                    facturacion::create([
                      'NFactura' => '',
                      'concepto'=> $request->opciones[$l],
                      'cantidad' => $request->cantidadAdmin,
                      'emision'=>'No Emitido',
                      'mes'=>$arrayMes[$j],
                      'ano'=>$ano,
                      'estado'=>false,
                      'id_Fecha'=>$fecha->id,
                      'id_Estado'=>$estado->id,
                      'id_Condominio'=>$empresa->id,
                      ]);
                  }
                  
                }else if($request->opciones[$l] == 'Parqueo'){
                  if(empty($request->cantidadParqueo)){
                    facturacion::create([
                      'NFactura' => '',
                      'concepto'=> $request->opciones[$l],
                      'cantidad' => 15,
                      'emision'=>'No Emitido',
                      'mes'=>$arrayMes[$j],
                      'ano'=>$ano,
                      'estado'=>false,
                      'id_Fecha'=>$fecha->id,
                      'id_Estado'=>$estado->id,
                      'id_Condominio'=>$empresa->id,
                      ]);
                  }else{
                    
                    facturacion::create([
                      'NFactura' => '',
                      'concepto'=> $request->opciones[$l],
                      'cantidad' => $request->cantidadParqueo,
                      'emision'=>'No Emitido',
                      'mes'=>$arrayMes[$j],
                      'ano'=>$ano,
                      'estado'=>false,
                      'id_Fecha'=>$fecha->id,
                      'id_Estado'=>$estado->id,
                      'id_Condominio'=>$empresa->id,
                      ]);
                  }
                  
                }

              $j=12;            
            }else{
             $estado = estado::create([
                'mes'=>$arrayMes[$j],
                'ano'=>$ano,
                'estado'=>false,
                'concepto'=>$request->opciones[$l],
                'id_Condominio'=>$empresa->id,
                'id_Fecha'=>$fecha->id,
                ]);
                if ($request->opciones[$l] == 'Administrativo') {
                  # code...
                  if(empty($request->cantidadAdmin)){
                    facturacion::create([
                      'NFactura' => '',
                      'concepto'=> $request->opciones[$l],
                      'cantidad' => 50,
                      'emision'=>'Emitido',
                      'mes'=>$arrayMes[$j],
                      'ano'=>$ano,
                      'estado'=>false,
                      'id_Fecha'=>$fecha->id,
                      'id_Estado'=>$estado->id,
                      'id_Condominio'=>$empresa->id,
                      ]);
                  }else{
                    
                    facturacion::create([
                      'NFactura' => '',
                      'concepto'=> $request->opciones[$l],
                      'cantidad' => $request->cantidadAdmin,
                      'emision'=>'Emitido',
                      'mes'=>$arrayMes[$j],
                      'ano'=>$ano,
                      'estado'=>false,
                      'id_Fecha'=>$fecha->id,
                      'id_Estado'=>$estado->id,
                      'id_Condominio'=>$empresa->id,
                      ]);
                  }
                  
                }else if($request->opciones[$l] == 'Parqueo'){
                  if(empty($request->cantidadParqueo)){
                    facturacion::create([
                      'NFactura' => '',
                      'concepto'=> $request->opciones[$l],
                      'cantidad' => 15,
                      'emision'=>'Emitido',
                      'mes'=>$arrayMes[$j],
                      'ano'=>$ano,
                      'estado'=>false,
                      'id_Fecha'=>$fecha->id,
                      'id_Estado'=>$estado->id,
                      'id_Condominio'=>$empresa->id,
                      ]);
                  }else{
                    facturacion::create([
                      'NFactura' => '',
                      'concepto'=> $request->opciones[$l],
                      'cantidad' => $request->cantidadParqueo,
                      'emision'=>'Emitido',
                      'mes'=>$arrayMes[$j],
                      'ano'=>$ano,
                      'estado'=>false,
                      'id_Fecha'=>$fecha->id,
                      'id_Estado'=>$estado->id,
                      'id_Condominio'=>$empresa->id,
                      ]);
                  }
                  
                }                
            }
            
        }
        }

        $ano=$ano+1;
      }



      // dd('guardado exitosamente');
      Session::flash('message','Comdomine: '.$empresa->nombre.' ha sido registrado Correctamente!!');
      return redirect()->route('condominio.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $condomine = condominio::find($id);
      return view('admin.condominio.show')->with('condomine',$condomine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $idE = explode('-',$id);
      if ($idE[1]==2) {
        # code...
        $condomine = condominio::find($id[0]);
        return view('admin.facturacion.edit')->with('condomine',$condomine);
      }else{
        $condomine = condominio::find($id[0]);
        return view('admin.condominio.edit')->with('condomine',$condomine);
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
      $empresa = empresa::find($id);
      $empresa->nombre = $request->nombre;
      $empresa->correo = $request->correo;
      $empresa->telefonoFijo = $request->telefonoFijo;
      $empresa->telefonoMovil = $request->telefonoMovil;
      $empresa->save();

      $condominio = condominio::find($id);
      $condominio->codigo = $request->codigo;
      $condominio->NLocal = $request->NLocal;
      $condominio->save();

      if(!empty($request->cantidadAdmin)){
      $estadoAdmin= estado::where('id_Condominio','=',$id)->where('concepto','=','Administrativo')->get()->last();
      $facturacionAdmin = facturacion::where('id_Estado','=',$estadoAdmin->id)->where('emision','=','No Emitido')->get()->last();
      $facturacionAdmin->cantidad = $request->cantidadAdmin;
      $facturacionAdmin->save();
      }
      
      if (!empty($request->cantidadParqueo)) {
        # code...
        $estadoParqueo= estado::where('id_Condominio','=',$id)->where('concepto','=','Parqueo')->get()->last();
        $facturacionParqueo = facturacion::where('id_Estado','=',$estadoParqueo->id)->where('emision','=','No Emitido')->get()->last();
        $facturacionParqueo->cantidad = $request->cantidadParqueo;
        $facturacionParqueo->save();
      }

     if ($request->factura == 2) {
       # code...
       Session::flash('message','El Comdomine : '.$empresa->nombre.' Con Numero de Local: '
      .$condominio->NLocal.' Fue Modificado Correctamente!!');
      // return redirect()->back();
      return redirect('/admin/facturacion');
     }else{
      Session::flash('message','El Comdomine : '.$empresa->nombre.' Con Numero de Local: '
      .$condominio->NLocal.' Fue Modificado Correctamente!!');
      // return redirect()->back();
      return redirect('/admin/buscar');
     }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $empresa = empresa::findOrFail($id);
        $empresa->delete();
        $condominio = condominio::findOrFail($id);
        $condominio->delete();
        $estado = estado::where('id_Condominio',$empresa->id);
        $estado->delete();
        $facturacion = facturacion::where('id_Condominio',$empresa->id);
        $facturacion->delete();
        // $facturacion = facturacion::where('id_estado','=',$cont);
        Session::flash('message','El Condominio: '.$empresa->nombre
        .' Con Numero de Local: '.$condominio->NLocal.' Fue Eliminado Exitosamente!!');
        return redirect('/admin/buscar');
    }
}
