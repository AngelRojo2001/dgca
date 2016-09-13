<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Caeb;
use App\Unidadindustrial;
use DB;

class CaebUiController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function create($id)
    {
        $caebs = Caeb::all();
        $categoria = [
            '1 y 2' => '1 y 2',
            '3' => '3',
            '4' => '4',
        ];
        return view('caebui.create', array(
            'ui_id' => $id,
            'caebs' => $caebs,
            'categoria' => $categoria,
        ));
    }

    public function store(Request $request)
    {
        $ui = Unidadindustrial::find($request->ui_id);

        $tam = count($request->categoriaCaeb);
        for ($i=0; $i < $tam; $i++) { 
            $ui->caebs()->attach($request->caeb[$i], ['categoria' => $request->categoriaCaeb[$i]]);
        }

        return redirect('registro/'.$request->ui_id)->with('message', 'Caeb Creado Correctamente');
    }

    public function destroy($id)
    {
        $caeb = DB::table('caeb_ui')
                ->where('caeb_id', $id)
                ->first();
        $ui = Unidadindustrial::find($caeb->unidad_industrial_id);

        $ui->caebs()->detach($id);
        return redirect('registro/'.$ui->id)->with('message', 'Caeb Eliminado Correctamente');
    }
}
