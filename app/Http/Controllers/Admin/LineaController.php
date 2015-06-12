<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
class LineaController extends Controller{
    public function linea()
    {
        $eventos =  \DB::table('eventos')
            ->select('titulo_evento')
            ->where('user_id', '=', Auth::user()->id)
            ->take(4)
            ->get();
        $datos['cTrabajo']= \DB::table('trabajo')->count();
        $datos['cCalendar'] = \DB::table('eventos')
            ->where('user_id', '=', Auth::user()->id)
            ->count();
        return view('admin/nuevaLinea',compact('eventos','datos'));
    }
    public function save(Request $request)
    {

        $titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $validator = Validator::make(
            [
                'titulo' => $titulo
            ],
            [
                'titulo' => 'required|max:255'
            ]);
        if ($validator->fails())
        {
            return redirect('admin/nuevalinea')->withErrors($validator);
        }
        \DB::insert('insert into lineaInvestigacion (Categoria, Descripcion)
                          values (?, ?)', [$titulo, $descripcion]);

        return redirect('admin/nuevalinea')->with(['success' => ' ']);
    }
} 