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
      $count = count($request->Mes);
      $anoV = $request->anoPago;
        for ($i=0; $i < $count ; $i++) {
          $estado = estado::where('id_Condominio',$id)->where('concepto',$request->radioConcepto)->where('mes',$request->Mes[$i])->where('ano',$request->array[$anoV])->get()->first();
          $busqueda= $estado->id;
          $cambio = estado::find($busqueda);
          $cambio->estado = true;//esta pagando
          $cambio->save();

        }


      $date = \Carbon\Carbon::now();

        $fecha = fecha::create([
          'dia'=>$date->format('d'),
          'mes'=>$date->format('m'),
          'ano'=>$date->format('Y'),
        ]);
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

        $nombreCondomine = empresa::find($id);

        Session::flash('message','Pago Registrado Exitosamente del Condomine: '.$nombreCondomine->nombre);

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
