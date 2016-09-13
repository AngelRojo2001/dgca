<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FuncionarioRequest;
use App\Http\Controllers\Controller;
use App\Persona;
use App\User;

class FuncionarioController extends Controller
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
        $funcionarios = User::select('usuario.id as id', 'persona.nombres as nombres', 'persona.apellidos as apellidos', 'usuario.login as login', 'persona.ci as ci', 'usuario.cargo as cargo', 'usuario.tipo as tipo')
                ->join('persona', 'persona.id', '=', 'usuario.persona_id')
                ->orderBy('persona.apellidos', 'asc')
                ->orderBy('persona.nombres', 'asc')
                ->where('usuario.active', 1)
                ->paginate(10);

        return view('funcionario.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = ['user' => 'Usuario', 'admin' => 'Administrador'];

        return view('funcionario.create', compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci = $request->ci;
        $persona->save();

        $funcionario = new User();
        $funcionario->login = $request->login;
        $funcionario->password = bcrypt('123456');
        $funcionario->cargo = $request->cargo;
        $funcionario->tipo = $request->tipo;
        $funcionario->active = 1;
        $funcionario->persona_id = $persona->id;
        $funcionario->save();

        return redirect('funcionario')->with('message', 'Funcionario Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = User::select('usuario.id as id', 'persona.nombres as nombres', 'persona.apellidos as apellidos', 'persona.ci as ci', 'usuario.cargo as cargo')
                ->join('persona', 'persona.id', '=', 'usuario.persona_id')
                ->where('usuario.id', $id)
                ->first();

        return view('funcionario.delete', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = User::select('usuario.id as id', 'persona.nombres as nombres', 'persona.apellidos as apellidos', 'usuario.login as login', 'persona.ci as ci', 'usuario.cargo as cargo', 'usuario.tipo as tipo')
                ->join('persona', 'persona.id', '=', 'usuario.persona_id')
                ->where('usuario.id', $id)
                ->first();
        $tipo = ['user' => 'Usuario', 'admin' => 'Administrador'];

        return view('funcionario.edit', compact('funcionario', 'tipo'));
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
        $funcionario = User::find($id);
        $funcionario->cargo = $request->cargo;
        $funcionario->tipo = $request->tipo;
        $funcionario->save();

        $persona = Persona::find($funcionario->persona_id);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci = $request->ci;
        $persona->save();

        return redirect('funcionario')->with('message', 'Funcionario Editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = User::find($id);
        $funcionario->active = 0;
        $funcionario->save();

        return redirect('funcionario')->with('message', 'Funcionario Inactivo');
    }
}
