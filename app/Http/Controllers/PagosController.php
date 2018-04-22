<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Carbon\Carbon;
use SIGRECOFERO\estado;
use SIGRECOFERO\condominio;
use SIGRECOFERO\ingreso_diario;
use SIGRECOFERO\fecha;
use SIGRECOFERO\empresa;
use SIGRECOFERO\facturacion;

class PagosController extends Controller
{

  public function buscar(){
    $condominiobusqueda = condominio::with('empresa')->orderBy('id')->get();
    return view('admin.pago.buscar')->with('condominiobusqueda',$condominiobusqueda);
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
      $condomine = condominio::find($id);
      return view('admin.pago.show')->with('condomine',$condomine);
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
      // dd($estado->all());
       return view('admin.pago.edit')->with('condomine', $condomine);
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

        $date = \Carbon\Carbon::now();

          $fecha = fecha::create([
            'dia'=>$date->format('d'),
            'mes'=>$date->format('m'),
            'ano'=>$date->format('Y'),
          ]);

        $count = count($request->Mes);
        $anoV = $request->anoPago;
        
          for ($i=0; $i < $count ; $i++) {
            $estado = estado::where('id_Condominio',$id)->where('concepto',$request->radioConcepto)->where('mes',$request->Mes[$i])->where('ano',$request->array[$anoV])->get()->first();

            $busqueda= $estado->id;
            
            $cambio = estado::find($busqueda);
            $cambio->id_Fecha = $fecha->id;
            $cambio->save();
            $arrayMes1[]= $estado->mes;

          }
            // dd('entro');
          $ingreso = ingreso_diario::create([
            'concepto'=>$request->radioConcepto,
            'formaPago'=>$request->radioPago,
            'NCheque'=>$request->NCheque,
            'cantidad'=>$request->cantidad,
            'descripcion'=>$request->descripcion,
            'id_Fecha'=>$fecha->id,
            'id_Condominio'=>$id,
          ]);
        $condomine = condominio::find($id);
        $concepto1 = $request->radioConcepto;
        return view('admin.pago.update')->with('arrayMes1',$arrayMes1)->with('condomine', $condomine)->with('concepto1',$concepto1);

      }else if($request->pagina == 2) {
        # code...
        // dd($request->all());
        if($request->radioConcepto == 'Otros'){

        }else{
        $date = \Carbon\Carbon::now();
      $count = count($request->mes);
      $anoV = $request->anoPago;

      $ingreso = ingreso_diario::where('id_Condominio',$id)->where('concepto','=',$request->radioConcepto)->orderby('created_at','DESC')->take(1)->get()->first();
      $idI = $ingreso->id;

        for ($i=0; $i < $count ; $i++) {
          $estado = estado::where('id_Condominio',$id)->where('concepto',$request->radioConcepto)->where('mes',$request->mes[$i])->where('ano',$request->ano)->get()->first();
          $busqueda = $estado->id;
          $arrayEstado[]=$estado->id;  
          $facturacion = facturacion::find($busqueda);
          $facturacion->NFactura = $request->factura[$i];
          $facturacion->save();
          $fecha = fecha::find($estado->id_Fecha);
          $fecha->dia = $date->format('d');
          $fecha->mes = $date->format('m');
          $fecha->ano = $date->format('Y');
          $fecha->save();
          $guardoingreso= ingreso_diario::find($idI);
          $guardoingreso->id_Fecha = $fecha->id;
          $guardoingreso->save();
          $cambio = estado::find($busqueda);
          $cambio->estado = true;//esta pagando
          $cambio->id_Fecha = $fecha->id;
          $cambio->save();
        }

        $nombreCondomine = empresa::find($id);

        Session::flash('message','Pago Registrado Exitosamente del Condomine: '.$nombreCondomine->nombre);

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
            'cantidad'=>$request->cantidad,
            'descripcion'=>$request->descripcion,
            'id_Fecha'=>$fecha->id,
            'id_Condominio'=>$estado->id_Condominio,
          ]);

          $facturacion = facturacion::find($estado->id);
          $facturacion->Nfactura = $request->factura;
          $facturacion->cantidad = $request->cantidad;
          $facturacion->save();


          $idCondo = $request->id_Condominio;
          $nombreCondomine = empresa::find($idCondo);

          Session::flash('message','Pago Registrado Exitosamente del Condomine: '.$nombreCondomine->nombre.
          ' En el mes de : '.$request->mes.' , Con concepto de : '.$request->radioConcepto );

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
