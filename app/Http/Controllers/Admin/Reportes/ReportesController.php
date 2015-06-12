<?php namespace App\Http\Controllers\Admin\Reportes;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ReportesController extends Controller{

    public function usuarios($op)
    {
        /*$pdf = App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();*/
        ob_start();
        if($op == "1")
        {
            $result = \DB::table('users')
                ->select('id','first_name', 'last_name', 'type','email')
                ->orderBy('id', 'asc')
                ->get();
        }
        else
        {
            $result = \DB::table('users')
                ->select('id','first_name', 'last_name', 'type','email')
                ->orderBy('last_name', 'asc')
                ->get();
        }
        extract($result);
        include('../resources/views/Reportes/usuarios.blade.php');
        $html = ob_get_clean();
        $pdf = App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($html)->setPaper('letter')->setOrientation('portrait');
        return $pdf->stream('reporte.pdf');
    }
    public function trabajos($op)
    {
        ob_start();
        if($op == "1")
        {
            $result = \DB::table('trabajo')
            ->join('users', 'users.id', '=', 'user_id')
//            ->join('lineaInvestigacion', 'lineaInvestigacion.id', '=', 'linea_id')
            ->select('trabajo.id', 'trabajo.titulo', 'trabajo.Descripcion', 'users.first_name', 'users.last_name', 'users.email')
            ->orderBy('trabajo.id', 'asc')
            ->get();
        }
        else
        {
            $result = \DB::table('trabajo')
            ->join('users', 'users.id', '=', 'user_id')
//            ->join('lineaInvestigacion', 'lineaInvestigacion.id', '=', 'linea_id')
            ->select('trabajo.id', 'trabajo.titulo', 'trabajo.rutaArchivo', 'trabajo.Descripcion', 'users.first_name', 'users.last_name', 'users.email')
            ->orderBy('trabajo.titulo', 'asc')
            ->get();
        }
        extract($result);
        include('../resources/views/Reportes/trabajos.blade.php');
        $html = ob_get_clean();
        $pdf = App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($html)->setPaper('letter')->setOrientation('landscape');
        return $pdf->stream('reporte.pdf');

    }
    public function lineas($op)
    {
        ob_start();
        if($op == "1")
        {
            $result = \DB::table('lineaInvestigacion')
                ->select('id','Categoria', 'Descripcion')
                ->orderBy('id', 'asc')
                ->get();
        }
        else
        {
            $result = \DB::table('lineaInvestigacion')
                ->select('id','Categoria', 'Descripcion')
                ->orderBy('Categoria', 'asc')
                ->get();
        }
        extract($result);
        include('../resources/views/Reportes/lineas.blade.php');
        $html = ob_get_clean();
        $pdf = App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($html)->setPaper('letter')->setOrientation('portrait');
        return $pdf->stream('reporte.pdf');
    }
    public function index()
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
        return view('Reportes/indexR', compact('eventos', 'datos'));
    }
    public function save(Request $request)
    {
        $tabla = $request->tabla;
        $ord = $request->ord;
        if($tabla == "1")
        {
            return $this->usuarios($ord);

        }
        if($tabla == "2")
        {
            return $this->trabajos($ord);

        }

        if($tabla == "3")
        {
            return $this->lineas($ord);

        }
    }
}