<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegistroRequest;
use App\Http\Controllers\Controller;
use App\UnidadIndustrial;
use App\Persona;
use App\User;
use App\Consultor;
use App\RLegal;
use App\Caeb;
use App\Rai;
use DB;

class RegistroController extends Controller
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
        $uis = DB::table('unidad_industrial as u')
                ->select('u.id as id', 'u.codigo_rai as codigo_rai', 'u.nombre_ui as nombre_ui', 'u.categoria as categoria', 'p.apellidos as apellidos', 'p.nombres as nombres')
                ->join('r_legal as r', 'r.unidad_industrial_id', '=', 'u.id')
                ->join('persona as p', 'p.id', '=', 'r.persona_id')
                ->get();
        return view('registro.index', array(
            'uis' => $uis,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caebs = Caeb::all();
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
        
        $categoria = [
            '1 y 2' => '1 y 2',
            '3' => '3',
            '4' => '4',
        ];
        $fase = [
            'Proyecto' => 'Proyecto',
            'Operación' => 'Operación',
            'Ampliación' => 'Ampliación',
            'Diversificación' => 'Diversificación',
        ];
        for ($i=1; $i < 15; $i++) { 
            $distrito[$i] = $i;
        }
        $tipo_registro = [
            'NUEVO' => 'NUEVO',
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
        return view('registro.create', array(
            'caebs' => $caebs,
            'categoria' => $categoria,
            'fase' => $fase,
            'distrito' => $distrito,
            'tipo_registro' => $tipo_registro,
            'archivado' => $archivado,
            'usuarios' => $selectUsuario,
            'consultores' => $selectConsultor,
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroRequest $request)
    {
        $ui = new UnidadIndustrial();
        $ui->codigo_rai = $request->codigo_rai;
        $ui->nombre_ui = $request->nombre_ui;
        $ui->razon_social = $request->razon_social;
        $ui->direccion_ui = $request->direccion_ui;
        $ui->distrito_ui = $request->distrito_ui;
        $ui->telefono = $request->telefono;
        $ui->coord_x = $request->coord_x;
        $ui->coord_y = $request->coord_y;
        $ui->categoria = $request->categoria;
        $ui->fase = $request->fase;
        $ui->save();

        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci = $request->ci;
        $persona->save();

        $rlegal = new RLegal();
        $rlegal->email = $request->email;
        $rlegal->persona_id = $persona->id;
        $rlegal->unidad_industrial_id = $ui->id;
        $rlegal->save();

        $tam = count($request->categoriaCaeb);
        for ($i=0; $i < $tam; $i++) { 
            $ui->caebs()->attach($request->caeb[$i], ['categoria' => $request->categoriaCaeb[$i]]);
        }

        $rai = new Rai();
        $rai->archivado = $request->archivado;
        $rai->tipo_registro = 'NUEVO';
        $rai->fecha_registro = $request->fecha_registro;
        $rai->usuario_id = $request->usuario_id;
        $rai->consultor_id = $request->consultor_id;
        $rai->unidad_industrial_id = $ui->id;
        $rai->save();

        return redirect('registro')->with('message', 'Registro Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ui = DB::table('unidad_industrial as u')
                ->select('u.id as id', 'u.codigo_rai as codigo_rai', 'u.nombre_ui as nombre_ui', 'u.razon_social as razon_social', 'u.direccion_ui as direccion_ui', 'u.distrito_ui as distrito_ui', 'u.telefono as telefono', 'u.coord_x as coord_x', 'u.coord_y as coord_y', 'u.categoria as categoria', 'u.fase as fase', 'r.email as email', 'p.nombres as nombres', 'p.apellidos as apellidos', 'p.ci as ci')
                ->join('r_legal as r', 'r.unidad_industrial_id', '=', 'u.id')
                ->join('persona as p', 'r.persona_id', '=', 'p.id')
                ->where('u.id', $id)
                ->first();

        $caebs = DB::table('caeb_ui as cu')
                ->select('c.id as id', 'c.codigo as codigo', 'c.descripcion as descripcion', 'cu.categoria')
                ->join('caeb as c', 'c.id', '=', 'cu.caeb_id')
                ->where('cu.unidad_industrial_id', $id)
                ->orderBy('c.codigo', 'asc')
                ->get();

        $rais = DB::table('rai as r')
                ->select('r.id as id', 'r.tipo_registro as tipo_registro', 'r.fecha_registro as fecha_registro', 'p.apellidos as apellidosF', 'p.nombres as nombresF', 'pe.apellidos as apellidosC', 'pe.nombres as nombresC', 'r.archivado as archivado')
                ->join('usuario as u', 'u.id', '=', 'r.usuario_id')
                ->join('persona as p', 'p.id', '=', 'u.persona_id')
                ->join('consultor as c', 'c.id', '=', 'r.consultor_id')
                ->join('persona as pe', 'pe.id', '=', 'c.persona_id')
                ->where('r.unidad_industrial_id', $id)
                ->orderBy('r.fecha_registro', 'desc')
                ->get();

        return view('registro.show', compact('ui', 'caebs', 'rais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ui = UnidadIndustrial::select('unidad_industrial.id as id', 'unidad_industrial.codigo_rai as codigo_rai', 'unidad_industrial.nombre_ui as nombre_ui', 'unidad_industrial.razon_social as razon_social', 'unidad_industrial.direccion_ui as direccion_ui', 'unidad_industrial.distrito_ui as distrito_ui', 'unidad_industrial.telefono as telefono', 'unidad_industrial.coord_x as coord_x', 'unidad_industrial.coord_y as coord_y', 'unidad_industrial.categoria as categoria', 'unidad_industrial.fase as fase', 'r_legal.email as email', 'persona.nombres as nombres', 'persona.apellidos as apellidos', 'persona.ci as ci')
                ->join('r_legal', 'r_legal.unidad_industrial_id', '=', 'unidad_industrial.id')
                ->join('persona', 'r_legal.persona_id', '=', 'persona.id')
                ->where('unidad_industrial.id', $id)
                ->first();

        $categoria = [
            '1 y 2' => '1 y 2',
            '3' => '3',
            '4' => '4',
        ];
        $fase = [
            'Proyecto' => 'Proyecto',
            'Operación' => 'Operación',
            'Ampliación' => 'Ampliación',
            'Diversificación' => 'Diversificación',
        ];
        for ($i=1; $i < 15; $i++) { 
            $distrito[$i] = $i;
        }
        return view('registro.edit', array(
            'ui' => $ui,
            'categoria' => $categoria,
            'fase' => $fase,
            'distrito' => $distrito,
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
        $ui = UnidadIndustrial::find($id);
        $ui->nombre_ui = $request->nombre_ui;
        $ui->razon_social = $request->razon_social;
        $ui->direccion_ui = $request->direccion_ui;
        $ui->distrito_ui = $request->distrito_ui;
        $ui->telefono = $request->telefono;
        $ui->coord_x = $request->coord_x;
        $ui->coord_y = $request->coord_y;
        $ui->categoria = $request->categoria;
        $ui->fase = $request->fase;
        $ui->save();

        $rlegal = RLegal::where('unidad_industrial_id', $id)->first();
        $rlegal->email = $request->email;
        $rlegal->save();

        $persona = Persona::find($rlegal->persona_id);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci = $request->ci;
        $persona->save();

        return redirect('registro/'.$id)->with('message', 'Registro Editado Correctamente');
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
