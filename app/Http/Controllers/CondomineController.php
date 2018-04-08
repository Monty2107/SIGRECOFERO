<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use SIGRECOFERO\contacto;
use SIGRECOFERO\condominio;
use SIGRECOFERO\empresa;

class CondomineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(){
      $condominiobusqueda = condominio::with('empresa')->orderBy('id')->get();
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
        // dd('estoy en el edit');
        $condomine = condominio::find($id);
        return view('admin.condominio.edit')->with('condomine',$condomine);
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

      Session::flash('message','El Comdomine : '.$empresa->nombre.' Con Numero de Local: '
      .$condominio->NLocal.' Fue Modificado Correctamente!!');
      // return redirect()->back();
      return redirect('/admin/buscar');
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
        Session::flash('message','El Condominio: '.$empresa->nombre
        .' Con Numero de Local: '.$condominio->NLocal.' Fue Eliminado Exitosamente!!');
        return redirect('/admin/buscar');
    }
}
