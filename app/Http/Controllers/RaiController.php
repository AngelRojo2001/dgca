<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Consultor;
use App\Rai;

class RaiController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    
    public function create($id)
    {
        $usuarios = User::select('usuario.id as id', 'persona.apellidos as apellidos', 'persona.nombres as nombres')
                ->join('persona', 'persona.id', '=', 'usuario.persona_id')
                ->orderBy('apellidos', 'asc')
                ->orderBy('nombres', 'asc')
                ->get();
        foreach ($usuarios as $usuario) {
            $selectUsuario[$usuario->id] = $usuario->apellidos." ".$usuario->nombres;
        }
        $consultores = Consultor::select('consultor.id as id', 'persona.apellidos as apellidos', 'persona.nombres as nombres')
                ->join('persona', 'persona.id', '=', 'consultor.persona_id')
                ->orderBy('apellidos', 'asc')
                ->orderBy('nombres', 'asc')
                ->get();
        foreach ($consultores as $consultor) {
            $selectConsultor[$consultor->id] = $consultor->apellidos." ".$consultor->nombres;
        }
        $tipo_registro = [
            'RENOVACIÓN' => 'RENOVACIÓN',
            'ACTUALIZACIÓN' => 'ACTUALIZACIÓN',
            'MODIFICACIÓN' => 'MODIFICACIÓN',
            'CIERRE' => 'CIERRE',
            'INFORME DE SEGUIMIENTO' => 'INFORME DE SEGUIMIENTO',
            'ANULADO' => 'ANULADO',
        ];
        $archivado = [
            'EXISTE EN ARCHIVO' => 'EXISTE EN ARCHIVO',
            'NO EXISTE EN ARCHIVO' => 'NO EXISTE EN ARCHIVO',
            'DGCA' => 'DGCA',
            'ÁREA LEGAL' => 'ÁREA LEGAL',
        ];
        return view('rai.create', array(
            'ui_id' => $id,
            'usuarios' => $selectUsuario,
            'consultores' => $selectConsultor,
            'archivado' => $archivado,
            'tipo_registro' => $tipo_registro,
        ));
    }

    public function store(Request $request)
    {
        $rai = new Rai();
        $rai->archivado = $request->archivado;
        $rai->tipo_registro = $request->tipo_registro;
        $rai->fecha_registro = $request->fecha_registro;
        $rai->usuario_id = $request->usuario_id;
        $rai->consultor_id = $request->consultor_id;
        $rai->unidad_industrial_id = $request->ui_id;
        $rai->save();

        return redirect('registro/'.$request->ui_id)->with('message', 'RAI Creado Correctamente');
    }

    public function edit($id)
    {
        $rai = Rai::find($id);
        $usuarios = User::select('usuario.id as id', 'persona.apellidos as apellidos', 'persona.nombres as nombres')
                ->join('persona', 'persona.id', '=', 'usuario.persona_id')
                ->orderBy('apellidos', 'asc')
                ->orderBy('nombres', 'asc')
                ->get();
        foreach ($usuarios as $usuario) {
            $selectUsuario[$usuario->id] = $usuario->apellidos." ".$usuario->nombres;
        }
        $consultores = Consultor::select('consultor.id as id', 'persona.apellidos as apellidos', 'persona.nombres as nombres')
                ->join('persona', 'persona.id', '=', 'consultor.persona_id')
                ->orderBy('apellidos', 'asc')
                ->orderBy('nombres', 'asc')
                ->get();
        foreach ($consultores as $consultor) {
            $selectConsultor[$consultor->id] = $consultor->apellidos." ".$consultor->nombres;
        }
        $tipo_registro = [
            'RENOVACIÓN' => 'RENOVACIÓN',
            'ACTUALIZACIÓN' => 'ACTUALIZACIÓN',
            'MODIFICACIÓN' => 'MODIFICACIÓN',
            'CIERRE' => 'CIERRE',
            'INFORME DE SEGUIMIENTO' => 'INFORME DE SEGUIMIENTO',
            'ANULADO' => 'ANULADO',
        ];
        $archivado = [
            'EXISTE EN ARCHIVO' => 'EXISTE EN ARCHIVO',
            'NO EXISTE EN ARCHIVO' => 'NO EXISTE EN ARCHIVO',
            'DGCA' => 'DGCA',
            'ÁREA LEGAL' => 'ÁREA LEGAL',
        ];
        return view('rai.edit', array(
            'rai' => $rai,
            'usuarios' => $selectUsuario,
            'consultores' => $selectConsultor,
            'archivado' => $archivado,
            'tipo_registro' => $tipo_registro,
        ));
    }

    public function update(Request $request, $id)
    {
        $rai = Rai::find($id);
        $rai->archivado = $request->archivado;
        $rai->tipo_registro = $request->tipo_registro;
        $rai->fecha_registro = $request->fecha_registro;
        $rai->usuario_id = $request->usuario_id;
        $rai->consultor_id = $request->consultor_id;
        $rai->save();

        return redirect('registro/'.$rai->unidad_industrial_id)->with('message', 'RAI Editado Correctamente');
    }

    public function destroy($id)
    {
        $rai = Rai::find($id);
        Rai::destroy($id);

        return redirect('registro/'.$rai->unidad_industrial_id)->with('message', 'RAI Eliminado Correctamente');
    }
}
