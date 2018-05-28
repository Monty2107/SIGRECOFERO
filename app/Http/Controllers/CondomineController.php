<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use SIGRECOFERO\contacto;
use SIGRECOFERO\condominio;
use SIGRECOFERO\empresa;
use SIGRECOFERO\ingreso_diario;
use SIGRECOFERO\estado;
use SIGRECOFERO\fecha;
use SIGRECOFERO\facturacion;
use SIGRECOFERO\bitacora;
use SIGRECOFERO\saldo;
use PDF;
use Carbon\Carbon;
use SIGRECOFERO\Http\Requests\CondomineRequest;
use SIGRECOFERO\Http\Requests\CondomineUpdateRequest;

class CondomineController extends Controller
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
    public function buscar(){
      $condominiobusqueda = condominio::with('empresa')->orderBy('id','desc')->get();
      return view('admin.condominio.buscar')->with('condominiobusqueda',$condominiobusqueda);
    }

    public function reportebuscar(){
      $condominiobusqueda = condominio::with('empresa')->orderBy('id','desc')->get();
      return view('admin.condominio.reportebuscar')->with('condominiobusqueda',$condominiobusqueda);
    }
    public function index()
    {
        return view('index');
    }

    public function reporte($id){

      $idE = explode('-',$id);
      if($idE[1]==3){

        $condomine = condominio::find($id[0]);
        $pdf = PDF::loadView('admin/condominio/estadoCuenta',['condomine' => $condomine]);
        $pdf->setpaper('A4','portrait');// vertical: portrait, horinzontal: landscape
        return $pdf->stream();

      }else if($idE[1]==4){

        $condomine = condominio::find($id[0]);
        $pdf = PDF::loadView('admin/condominio/estadoCuenta',['condomine' => $condomine]);
        $pdf->setpaper('A4','portrait');// vertical: portrait, horinzontal: landscape
        return $pdf->download('estado_Cuenta Condomine_'.$condomine->NLocal.'.pdf');
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Auth::User()->cargo == 'Administracion'  ){
        return view('admin.condominio.create');
      }else{
        return rediderct('/');
      }
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CondomineRequest $request)
    {
      // dd($request->all());
      $ano  = $request->facturacion;
      $carbon = new \Carbon\Carbon();
      $date = $carbon->now();
      $LNum= explode('-',$request->NLocal);
      $fecha = fecha::create([
        'dia'=>$date->format('d'),
        'mes'=>'12',
        'ano'=>$date->format('Y') - 1,
      ]);

      if($ano > $date->year ){
        Session::flash('error','El Año de Inicio de la Facturacion no Debe Ser Mayor al año: '.$date->year);
      return redirect('admin/condominio/create');
      }

      if($LNum[1] == 0 ){
        Session::flash('error','No Puede Usar Local: '.$request->NLocal.' Ya Que Su Valor Es: '.$LNum[1]);
      return redirect('admin/condominio/create');
      }
      // dd(empty($request->cantidadAdmin));
      
      $empresa = empresa::create([
        'nombre'=>$request->nombreCondominio,
        'correo' => $request->correo,
        'telefonoFijo'=>$request->telefonoFijo,
        'telefonoMovil'=>$request->telefonoMovil,
      ]);

      $condomine = condominio::create([
        'codigo'=>$request->codigo,
        'NLocal'=>$request->NLocal,
        'nombre'=>$request->nombreContacto,
        'observaciones'=>$request->observaciones,
        'id_Empresa'=>$empresa->id,
      ]);

      if(empty($request->antiguo)){
      saldo::create([
        'estado'=>'Antiguo',
        'cantidad' =>'0',
        'concepto'=>'Todos',
        'id_Condominio'=>$condomine->id,
        'id_Fecha'=>$fecha->id,
      ]);
      }else{
        saldo::create([
          'estado'=>'Antiguo',
          'cantidad' =>$request->antiguo,
          'concepto'=>'Todos',
          'id_Condominio'=>$condomine->id,
          'id_Fecha'=>$fecha->id,
        ]);
      }
      

      
      $arrayMes = array('1' =>'Enero' , '2'=>'Febrero', '3'=>'Marzo','4'=>'Abril',
      '5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre',
      '11'=>'Noviembre','12'=>'Diciembre' );
      $cantMes=count($arrayMes);
      $concepto = count($request->opciones);

        
        $m = $date->format('m');
        for ($i=$ano; $i <= $date->year ; $i++) {

          
          for ($k=1; $k <= $concepto ; $k++) {
            $l=$k-1;
          for ($j=1; $j <=$cantMes ; $j++) {
            if($j < 10){
              $fecha = fecha::create([
                'dia'=>$date->format('d'),
                'mes'=>'0'.$j,
                'ano'=>$date->format('Y'),
              ]);
            }else{
              $fecha = fecha::create([
                'dia'=>$date->format('d'),
                'mes'=>$j,
                'ano'=>$date->format('Y'),
              ]);
            }
            
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

                      $antiguedad = saldo::create([
                        'estado'=>'Deudas',
                        'cantidad'=>50,
                        'concepto'=>$request->opciones[$l],
                        'id_Condominio'=>$empresa->id,
                        'id_Fecha'=>$fecha->id,
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

                      $antiguedad = saldo::create([
                        'estado'=>'Deudas',
                        'cantidad'=>$request->cantidadAdmin,
                        'concepto'=>$request->opciones[$l],
                        'id_Condominio'=>$empresa->id,
                        'id_Fecha'=>$fecha->id,
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

                      $antiguedad = saldo::create([
                        'estado'=>'Deudas',
                        'cantidad'=> 15,
                        'concepto'=>$request->opciones[$l],
                        'id_Condominio'=>$empresa->id,
                        'id_Fecha'=>$fecha->id,
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

                      $antiguedad = saldo::create([
                        'estado'=>'Deudas',
                        'cantidad'=>$request->cantidadAdmin,
                        'concepto'=>$request->opciones[$l],
                        'id_Condominio'=>$empresa->id,
                        'id_Fecha'=>$fecha->id,
                        ]);
                  }
                  
                }                
            }
            
        }
        }

        $ano=$ano+1;
      }
      // dd('guardado exitosamente');
      bitacora::bitacoras('Registro','Registro de Condominio: '.$empresa->nombre);
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
        if(Auth::User()->cargo == "Financiero" || Auth::User()->cargo == "Administracion"){
          $condomine = condominio::find($id[0]);
        return view('admin.facturacion.edit')->with('condomine',$condomine);
        }else{
          return redirect('/');
        }
        
      }else if($idE[1]==1){
        if(Auth::User()->cargo == 'Administracion'  ){
        $condomine = condominio::find($id[0]);
        return view('admin.condominio.edit')->with('condomine',$condomine);
      }else{
        return redirect('/');
      }  

      }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CondomineUpdateRequest $request, $id)
    {
      $empresa = empresa::find($id);
      $empresa->nombre = $request->nombreCondominio;
      $empresa->correo = $request->correo;
      $empresa->telefonoFijo = $request->telefonoFijo;
      $empresa->telefonoMovil = $request->telefonoMovil;
      $empresa->save();

      $condominio = condominio::find($id);
      $condominio->codigo = $request->codigo;
      $condominio->NLocal = $request->NLocal;
      $condominio->nombre = $request->nombreContacto;
      $condominio->observaciones = $request->observaciones;
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
       bitacora::bitacoras('Modificacion','Modifico el Condominio: '.$condominio->nombre);
       Session::flash('message','El Comdomine : '.$condominio->nombre.' Con Numero de Local: '
      .$condominio->NLocal.' Fue Modificado Correctamente!!');
      // return redirect()->back();
      return redirect('/admin/facturacion');
     }else{
      bitacora::bitacoras('Modificacion','Modifico el Condominio: '.$condominio->nombre);
      Session::flash('message','El Comdomine : '.$condominio->nombre.' Con Numero de Local: '
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
      if(Auth::User()->cargo == "Administracion"){
        $empresa = empresa::findOrFail($id);
        $empresa->delete();
        $condominio = condominio::findOrFail($id);
        $condominio->delete();
        $estado = estado::where('id_Condominio',$empresa->id);
        $estado->delete();
        $facturacion = facturacion::where('id_Condominio',$empresa->id);
        $facturacion->delete();
        $antiguo = saldo::where('id_Condominio',$empresa->id);
        $antiguo->delete();
        // $facturacion = facturacion::where('id_estado','=',$cont);
        bitacora::bitacoras('Eliminacion','Elimino el Condominio: '.$condominio->nombre);
        Session::flash('message','El Condominio: '.$condominio->nombre
        .' Con Numero de Local: '.$condominio->NLocal.' Fue Eliminado Exitosamente!!');
        return redirect('/admin/buscar');
      }else{
        return redirect('/');
      }
        
    }
}
