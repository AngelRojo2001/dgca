<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ConsultorRequest;
use App\Http\Controllers\Controller;
use App\Consultor;
use App\Persona;

class ConsultorController extends Controller
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
        $consultores = Consultor::select('consultor.id as id', 'persona.nombres as nombres', 'persona.apellidos as apellidos', 'persona.ci as ci', 'consultor.renca as renca')
                ->join('persona', 'persona.id', '=', 'consultor.persona_id')
                ->orderBy('persona.apellidos', 'asc')
                ->orderBy('persona.nombres', 'asc')
                ->where('consultor.active', 1)
                ->paginate(10);

        return view('consultor.index', compact('consultores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultorRequest $request)
    {
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci = $request->ci;
        $persona->save();

        $funcionario = new Consultor();
        $funcionario->renca = $request->renca;
        $funcionario->active = 1;
        $funcionario->persona_id = $persona->id;
        $funcionario->save();

        return redirect('consultor')->with('message', 'Consultor Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consultor = Consultor::select('consultor.id as id', 'persona.nombres as nombres', 'persona.apellidos as apellidos', 'persona.ci as ci', 'consultor.renca as renca')
                ->join('persona', 'persona.id', '=', 'consultor.persona_id')
                ->where('consultor.id', $id)
                ->first();

        return view('consultor.delete', compact('consultor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultor = Consultor::select('consultor.id as id', 'persona.nombres as nombres', 'persona.apellidos as apellidos', 'persona.ci as ci', 'consultor.renca as renca')
                ->join('persona', 'persona.id', '=', 'consultor.persona_id')
                ->where('consultor.id', $id)
                ->first();

        return view('consultor.edit', compact('consultor'));
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
        $consultor = Consultor::find($id);
        $consultor->renca = $request->renca;
        $consultor->save();

        $persona = Persona::find($consultor->persona_id);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci = $request->ci;
        $persona->save();

        return redirect('consultor')->with('message', 'Consultor Editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultor = Consultor::find($id);
        $consultor->active = 0;
        $consultor->save();

        return redirect('consultor')->with('message', 'Consultor Inactivo');
    }
}
