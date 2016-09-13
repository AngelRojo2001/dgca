<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CaebRequest;
use App\Http\Controllers\Controller;
use App\Caeb;

class CaebController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caebs = Caeb::orderBy('codigo','asc')->paginate(15);
        return view('caeb.index', array(
            'caebs' => $caebs
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caeb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CaebRequest $request)
    {
        $caeb = new Caeb();
        $caeb->codigo = $request->codigo;
        $caeb->descripcion = $request->descripcion;
        $caeb->save();

        return redirect('caeb')->with('message', 'CAEB Creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caeb = Caeb::find($id);
        return view('caeb.delete', compact('caeb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caeb = Caeb::find($id);
        return view('caeb.edit', array(
            'caeb' => $caeb
        ));
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
        $caeb = Caeb::find($id);
        $caeb->descripcion = $request->descripcion;
        $caeb->save();

        return redirect('caeb')->with('message', 'CAEB Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Caeb::destroy($id);

        return redirect('caeb')->with('message', 'CAEB Eliminado Correctamente');
    }
}
