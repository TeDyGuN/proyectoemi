<?php

namespace App\Http\Controllers\Sistema;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SeguimientoController extends Controller
{
    public function mistrabajos()
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
        $trabajos = \DB::table('trabajo')
            ->join('users as u1', 'tutor_id', '=', 'u1.id')
            ->join('users as u2', 'revisor_id', '=', 'u2.id')
            ->join('lineaInvestigacion as li', 'linea_id', '=', 'li.id')
            ->select('trabajo.id','titulo', 'rutaArchivo','u1.last_name as tutorlast_name', 'u1.first_name as tutorfirst_name',
                'u2.first_name as revfirst_name', 'u2.last_name as revlast_name', 'li.Categoria')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        return view('pages/mistrabajos',compact('eventos','datos', 'trabajos'));
    }
    public function revision()
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
        $trabajos = \DB::table('trabajo')
            ->join('users as u1', 'tutor_id', '=', 'u1.id')
            ->join('users as u2', 'revisor_id', '=', 'u2.id')
            ->join('lineaInvestigacion as li', 'linea_id', '=', 'li.id')
            ->select('trabajo.id','titulo', 'rutaArchivo','u1.last_name as tutorlast_name', 'u1.first_name as tutorfirst_name',
                'u2.first_name as revfirst_name', 'u2.last_name as revlast_name', 'li.Categoria')
            ->where('u1.id', '=', Auth::user()->id)
            ->orWhere('u2.id', '=', Auth::user()->id)
            ->get();
        return view('pages/revision', compact('eventos', 'datos', 'trabajos'));
    }
    public function seguimiento($id)
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
        $trabajos = \DB::table('trabajo')
            ->join('users as u1', 'tutor_id', '=', 'u1.id')
            ->join('users as u2', 'revisor_id', '=', 'u2.id')
            ->join('lineaInvestigacion as li', 'linea_id', '=', 'li.id')
            ->select('titulo', 'rutaArchivo', 'trabajo.Descripcion', 'u1.last_name as tutorlast_name', 'u1.first_name as tutorfirst_name',
                'u1.email as tutoremail','u2.first_name as revfirst_name', 'u2.last_name as revlast_name',
                'u2.email as revemail','li.Categoria')
            ->where('trabajo.id', '=', $id)
            ->get();
        $revision = \DB::table('recotabla')
            ->join('users as u1', 'revisor', '=', 'u1.id')
            ->select('recotabla.id','reco', 'status', 'u1.first_name', 'u1.last_name')
            ->where('trabajo', '=', $id)
            ->get();
        return view('pages/trabajo', compact('eventos', 'datos', 'trabajos', 'revision'));
    }
    public function revision_seguimiento($id)
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
        $trabajos = \DB::table('trabajo')
            ->join('users as u1', 'tutor_id', '=', 'u1.id')
            ->join('users as u2', 'revisor_id', '=', 'u2.id')
            ->join('users as u3', 'user_id', '=', 'u3.id')
            ->join('lineaInvestigacion as li', 'linea_id', '=', 'li.id')
            ->select('trabajo.id', 'u3.id as usuarioid','titulo', 'rutaArchivo', 'trabajo.Descripcion', 'u1.last_name as tutorlast_name', 'u1.first_name as tutorfirst_name',
                'u1.email as tutoremail','u2.first_name as revfirst_name', 'u2.last_name as revlast_name',
                'u2.email as revemail','li.Categoria')
            ->where('trabajo.id', '=', $id)
            ->get();
        return view('pages/trabajorevision', compact('eventos', 'datos', 'trabajos'));
    }
    public function saveRevision(Request $request)
    {

        \DB::insert('insert into recotabla (reco, status, revisor, trabajo, user)
                          values (?, ?, ?, ?, ?)', [$request->texto, $request->des, Auth::user()->id, $request->trabajo_id, $request->usuario_id]);

        return redirect('sistema/revision');
    }
} 