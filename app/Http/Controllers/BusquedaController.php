<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class BusquedaController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function ui()
    {
        return view('busqueda.ui');
    }

    public function uibuscar(Request $request)
    {
        $uis = DB::table('unidad_industrial as u')
                ->select('u.id as id', 'u.codigo_rai as codigo_rai', 'u.nombre_ui as nombre_ui', 'u.categoria as categoria', 'p.apellidos as apellidos', 'p.nombres as nombres')
                ->join('r_legal as r', 'r.unidad_industrial_id', '=', 'u.id')
                ->join('persona as p', 'p.id', '=', 'r.persona_id')
                ->where('u.nombre_ui', 'LIKE', '%'.$request->ui.'%')
                ->orderBy('u.nombre_ui', 'asc')
                ->get();

        return view('registro.lista', compact('uis'));
    }

    public function rl()
    {
        return view('busqueda.rl');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rlbuscar(Request $request)
    {
        $uis = DB::table('unidad_industrial as u')
                ->select('u.id as id', 'u.codigo_rai as codigo_rai', 'u.nombre_ui as nombre_ui', 'u.categoria as categoria', 'p.apellidos as apellidos', 'p.nombres as nombres')
                ->join('r_legal as r', 'r.unidad_industrial_id', '=', 'u.id')
                ->join('persona as p', 'p.id', '=', 'r.persona_id')
                ->where('p.apellidos', 'LIKE', '%'.$request->rl.'%')
                ->orWhere('p.nombres', 'LIKE', '%'.$request->rl.'%')
                ->orderBy('p.apellidos', 'asc')
                ->orderBy('p.nombres', 'asc')
                ->get();

        return view('registro.lista', compact('uis'));
    }
}
