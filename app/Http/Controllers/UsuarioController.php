<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use SIGRECOFERO\User;
use SIGRECOFERO\bitacora;
use SIGRECOFERO\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
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
        //
    }

    public function perfil()
    {
        $usuario = \SIGRECOFERO\User::find(Auth::User()->id);
        return view('admin.usuario.perfil')->with('usuario',$usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        dd('yupi');
        condominio::create([
            'name'=>$request->nombre,
            'email'=>$request->correo,
            'password'=>$empresa->password,
            'cargo'=>$request->cargo
          ]);
          bitacora::bitacoras('Creacion del Usuario','Usuario: '.$usuario->name.' Creado');
        Session::flash('message',' Usuario: '.$usuario->name.' Con Correo: '.$usuario->email.' ha sido Creado Correctamente!!');
      return redirect('/');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        

        $usuario = User::find($id[1]);
        $usuario->name = $request->nombre;
        $usuario->email = $request->correo;
        $usuario->password = $request->password;
        $usuario->save();

        bitacora::bitacoras('Modificacion de Usuario','Usuario: '.$usuario->name.' Modificado');
        Session::flash('message',' Usuario: '.$usuario->name.' Con Correo: '.$usuario->email.' ha sido Modificado Correctamente!!');
      return redirect()->back();


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
