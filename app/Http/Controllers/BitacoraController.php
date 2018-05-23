<?php

namespace SIGRECOFERO\Http\Controllers;

use Illuminate\Http\Request;
use SIGRECOFERO\bitacora;
use SIGRECOFERO\fecha;
use SIGRECOFERO\User;
use Input;
use Session;

class BitacoraController extends Controller
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
        $bitas = bitacora::all();
        $userss = User::all();
        return view('admin.seguridad.bitacora',compact('bitas','userss'));
    }

    public function ReporteBitacoras($tipo)
    {
        $vistaurl="admin.seguridad.ReporteBitacoras";
        return $this->crearReporteBitacoras($vistaurl,$tipo);
    }

    public function crearReporteBitacoras($vistaurl,$tipo)
    {
        $carbon = new \Carbon\Carbon();
        $dates = $carbon->now();
        $date = $dates->format('Y-m-d');
        $view = \View::make($vistaurl, compact('date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if ($tipo==1) {
            return $pdf->stream('ReporteBitacoras.pdf');
        }
        if ($tipo==2) {
            return $pdf->download('ReporteBitacoras.pdf');
        }else{
            $bitas = bitacora::all();
        $userss = User::all();
        return view('admin.seguridad.bitacora',compact('bitas','userss'));
        }

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
        //
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
    public function update(Request $request, $id)
    {
        //
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
