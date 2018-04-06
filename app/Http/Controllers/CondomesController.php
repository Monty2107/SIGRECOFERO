<?php

namespace SIGRECOFERO\Http\Controllers;

use SIGRECOFERO\odel;
use Illuminate\Http\Request;
use SIGRECOFERO\contacto;
use SIGRECOFERO\empresa;
use SIGRECOFERO\condominio;
use Session;
use Redirect;

class CondomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
      $contacto = contacto::create([
        'correo' => $request->email,
        'telefonoFijo'=>$request->phonefijo,
        'telefonoMovil'=>$request->phoneMovil,
      ]);

      $empresa = empresa::create([
        'nombre'=>$request->name,
        'id_Contacto'=>$contacto->id,
      ]);

      condominio::create([
        'codigo'=>$request->codigo,
        'NLocal'=>$request->Nlocal,
        'id_Empresa'=>$empresa->id,
      ]);

      // dd('guardado exitosamente');
      Session::flash('message','Comdomine Registrado Correctamente!!');
      return redirect()->route('condominio.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SIGRECOFERO\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function show(odel $odel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIGRECOFERO\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function edit(odel $odel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIGRECOFERO\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, odel $odel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIGRECOFERO\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function destroy(odel $odel)
    {
        //
    }
}
