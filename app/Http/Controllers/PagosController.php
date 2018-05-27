<?php
namespace SIGRECOFERO\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use SIGRECOFERO\estado;
use SIGRECOFERO\condominio;
use SIGRECOFERO\ingreso_diario;
use SIGRECOFERO\fecha;
use SIGRECOFERO\empresa;
use SIGRECOFERO\facturacion;
use SIGRECOFERO\bitacora;
use SIGRECOFERO\AntiguedadSaldo;
use SIGRECOFERO\Http\Requests\PagoRequest;
class PagosController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}
  public function buscar(){
    if(Auth::User()->cargo == 'Administracion'){
      $condominiobusqueda = condominio::with('empresa')->get();
    return view('admin.pago.buscar')->with('condominiobusqueda',$condominiobusqueda);
    }else{
      return redirect('/');
    }
    
  }
  public function getMesesAdmin(Request $request, $id){
    
    if($request->ajax()){
      $estado = estado::mesesAdmin($id);
      return response()->json($estado);
    }
  }
  public function getMesesParqueo(Request $request,$id){
    if($request->ajax()){
      $estado1 = estado::mesesParqueo($id);
      return response()->json($estado1);
    }
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      if(Auth::User()->cargo == "Administracion"){
        $condomine = condominio::find($id);
        return view('admin.pago.show')->with('condomine',$condomine);
      }else{
        return redirect('/');
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
      $condomine = condominio::find($id);
      // dd($estado->all());
       return view('admin.pago.edit')->with('condomine', $condomine);
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
     // dd($request->all());

      if ($request->pagina == 1) {
        if(empty($request->radioConcepto)){
          Session::flash('error','No A Seleccionado un Concepto, Complete Todos Los Campos');
           return redirect()->back();
         }
         if(empty($request->radioPago)){
          Session::flash('error','No Selecciono el Concepto de Pago, Complete Todos Los Campos');
           return redirect()->back();
         }
         if(empty($request->cantidad)){
          Session::flash('error','No A Escrito La Cantidad, Complete Todos Los Campos');
           return redirect()->back();
         }
         
         if(empty($request->NCheque) && $request->radioConcepto == "Cheque"){
          Session::flash('error','No A Ingresado Numero de Cheque, Complete Todos Los Campos');
           return redirect()->back();
         }
         if(empty($request->NBanco) && $request->radioConcepto == "Cheque"){
          Session::flash('error','No A Ingresado El Nombre del Banco, Complete Todos Los Campos');
           return redirect()->back();
         }
         if(empty($request->Mes) ){
          Session::flash('error','No Selecciono el Mes, Complete Todos Los Campos');
           return redirect()->back();
         }
        $date = \Carbon\Carbon::now();
          $fecha = fecha::create([
            'dia'=>$date->format('d'),
            'mes'=>$date->format('m'),
            'ano'=>$date->format('Y'),
          ]);
        $count = count($request->Mes);
        if($request->anoPagoAdmin != 0){
          $cambio = $request->anoPagoAdmin;
          $anoPago = explode('-',$cambio);
        }else{
          $cambio= $request->anoPagoParqueo;
          $anoPago = explode('-',$cambio);
        }
        
        
        
          for ($i=0; $i < $count ; $i++) {
            $estado = estado::where('id_Condominio',$id)->where('concepto',$request->radioConcepto)->where('mes',$request->Mes[$i])->where('ano','=',$anoPago['0'])->get()->first();
            
            $busqueda= $estado->id;
            $cambio = estado::find($busqueda);
            $cambio->id_Fecha = $fecha->id;
            $cambio->save();
            $arrayMes1[]= $estado->mes;
          }
            // dd($arrayMes1);
          $ingreso = ingreso_diario::create([
            'concepto'=>$request->radioConcepto,
            'formaPago'=>$request->radioPago,
            'NCheque'=>$request->NCheque,
            'NBanco'=>$request->NBanco,
            'cantidad'=>$request->cantidad,
            'descripcion'=>$request->descripcion,
            'id_Fecha'=>$fecha->id,
            'id_Condominio'=>$id,
          ]);
        $condomine = condominio::find($id);
        $concepto1 = $request->radioConcepto;
        return view('admin.pago.update')->with('anoPago',$anoPago['0'])->with('arrayMes1',$arrayMes1)->with('condomine', $condomine)->with('concepto1',$concepto1);
      }else if($request->pagina == 2) {
        # code...
        // dd("que");
        if($request->radioConcepto == 'Otros'){
        }else{
          
        $date = \Carbon\Carbon::now();
      $count = count($request->mes);
      $anoV = $request->anoPago;
      $ingreso = ingreso_diario::where('id_Condominio',$id)->where('concepto','=',$request->radioConcepto)->orderby('created_at','DESC')->take(1)->get()->first();
      $idI = $ingreso->id;
      
      $fecha = fecha::find($ingreso->id_Fecha);
          $fecha->dia = $date->format('d');
          $fecha->mes = $date->format('m');
          $fecha->ano = $date->format('Y');
          $fecha->save();

        for ($i=0; $i < $count ; $i++) {
          $estado = estado::where('id_Condominio',$id)->where('concepto',$request->radioConcepto)->where('mes',$request->mes[$i])->where('ano',$request->ano)->get()->first();
          $busqueda = $estado->id;
          $arrayEstado[]=$estado->id; 
 
          $facturacion = facturacion::find($busqueda);
          $facturacion->NFactura = $request->factura[$i];
          $facturacion->id_Fecha = $fecha->id;
          $facturacion->estado = true;//esta pagado
          $facturacion->save();
          
          $guardoingreso= ingreso_diario::find($idI);
          $guardoingreso->id_Fecha = $fecha->id;
          $guardoingreso->save();
          $cambio = estado::find($busqueda);
          $cambio->estado = true;//esta pagando
          $cambio->id_Fecha = $fecha->id;
          $cambio->save();

          $total = $guardoingreso->cantidad / $count;
          $antiguedad = AntiguedadSaldo::create([
            'estado'=>'Pagos',
            'cantidad'=> $total,
            'concepto'=>$guardoingreso->concepto,
            'id_Condominio'=>$guardoingreso->id_Condominio,
            'id_Fecha'=>$fecha->id,
            ]);
        }
        $nombreCondomine = empresa::find($id);
        if($cambio->concepto == 'Parqueo'){
          bitacora::bitacoras('Registro Pago','Pago Registrado al Condominie: '.
          $nombreCondomine->nombre.' En Concepto de: '.$cambio->concepto);
          Session::flash('message','Pago Registrado Exitosamente del Condomine: '.$nombreCondomine->nombre.
          " En Concepto de : Pago de ".$cambio->concepto);
        }else{
          bitacora::bitacoras('Registro Pago','Pago Registrado al Condominie: '.
          $nombreCondomine->nombre.' En Concepto de: '.$cambio->concepto);
          Session::flash('message','Pago Registrado Exitosamente del Condomine: '.$nombreCondomine->nombre.
          " En Concepto de : Pago ".$cambio->concepto);
        }
       
        return redirect('/admin/buscarCondomine');
      }
      }else{
        //Solo si paga un solo mes
        // dd($request->all());
        $date = \Carbon\Carbon::now();
          $fecha = fecha::create([
            'dia'=>$date->format('d'),
            'mes'=>$date->format('m'),
            'ano'=>$date->format('Y'),
          ]);
            $estado = estado::find($id);
            $estado->estado = true;//esta pagando
            $estado->id_Fecha = $fecha->id;
            $estado->save();
            $arrayMes1[]= $estado->mes;
          $ingreso = ingreso_diario::create([
            'concepto'=>$request->radioConcepto,
            'formaPago'=>$request->radioPago,
            'NCheque'=>$request->NCheque,
            'NBanco'=>$request->NBanco,
            'cantidad'=>$request->cantidad,
            'descripcion'=>$request->descripcion,
            'id_Fecha'=>$fecha->id,
            'id_Condominio'=>$estado->id_Condominio,
          ]);
          $facturacion = facturacion::find($estado->id);
          $facturacion->Nfactura = $request->factura;
          $facturacion->cantidad = $request->cantidad;
          $facturacion->id_Fecha = $fecha->id;
          $facturacion->estado = true;//esta pagado
          $facturacion->save();

          $antiguedad = AntiguedadSaldo::create([
            'estado'=>'Pagos',
            'cantidad'=>$ingreso->cantidad,
            'concepto'=>$ingreso->concepto,
            'id_Condominio'=>$ingreso->id_Condominio,
            'id_Fecha'=>$fecha->id,
            ]);

          $idCondo = $request->id_Condominio;
          $nombreCondomine = empresa::find($idCondo);
          if($request->radioConcepto == 'Otros'){
            bitacora::bitacoras('Registro Pago','Pago Registrado al Condominie: '.
            $nombreCondomine->nombre.' En Concepto de: '.$estado->descripcion);
            Session::flash('message','Pago Registrado Exitosamente del Condomine: '.$nombreCondomine->nombre.
          ' En el mes de : '.$request->mes.' , Con concepto de : '.$estado->descripcion);
          }else{
            bitacora::bitacoras('Registro Pago','Pago Registrado al Condominie: '.
            $nombreCondomine->nombre.' En Concepto de: '.$request->radioConcepto);
            Session::flash('message','Pago Registrado Exitosamente del Condomine: '.$nombreCondomine->nombre.
          ' En el mes de : '.$request->mes.' , Con concepto de : '.$request->radioConcepto );
          }
          
          return redirect('/admin/buscarCondomine');
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
        //
    }
}