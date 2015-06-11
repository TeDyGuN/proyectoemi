<?php namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use Auth;
use Validator;

class TrabajoController extends Controller {

    public function nuevotrabajo()
    {
        $result = \DB::table('lineaInvestigacion')
            ->select('id','Categoria')
            ->get();
        return view('pages/File', compact('result'));
    }

    /**
     * @param Request $request
     * @return string
     **/
    public function documentos()
    {
        return view('pages/Documentos');
    }
    public function listadoTrabajos()
    {
        $result = \DB::table('trabajo')
            ->join('users', 'users.id', '=', 'user_id')
//            ->join('lineaInvestigacion', 'lineaInvestigacion.id', '=', 'linea_id')
            ->select('trabajo.id', 'trabajo.titulo', 'trabajo.rutaArchivo', 'trabajo.Descripcion', 'users.first_name', 'users.last_name', 'users.email')
            ->get();

        return view('pages/listadoTrabajos', compact('result'));
    }
    public function save(Request $request)
    {

        $titulo = $request->titulo;
        $idtutor = $request->idtutor;
        $idrevisor = $request->idrevisor;
        $idlinea = $request->type;
        $descripcion = $request->descripcion;
        //obtenemos el campo file definido en el formulario
        $file = $request->file('archivo');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        $public_path = public_path();
        $url = '/storage/'.$nombre;
        $messages = [
            'mimes' => 'Solo se permiten Archivos .pdf, .doc, .docx.',
        ];
        $validator = Validator::make(
            [
                'titulo' => $titulo,
                'file' => $file,
                'nombre' => $nombre
            ],
            [
                'titulo' => 'required|max:255',
                'file' => 'mimes:doc,docx,pdf'
            ],
        $messages);
        $message = 'f';
        if ($validator->fails())
        {
            return redirect('sistema/nuevotrabajo')->withErrors($validator);
        }
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
        \DB::insert('insert into trabajo (titulo, nombreArchivo, rutaArchivo, user_id, tutor_id, revisor_id, linea_id, Descripcion)
                          values (?, ?, ?, ?, ?, ?, ?, ?)', [$titulo, $nombre, $url, Auth::user()->id, $idtutor, $idrevisor, $idlinea, $descripcion]);

        return redirect('sistema/nuevotrabajo')->with(['success' => ' ']);
    }
    public function buscar()
    {
        $name = Input::get('nombre');
        $usuarios = User::where('last_name', 'LIKE', '%' . $name . '%')->where('type', '=', 'Docente')->take(3)->get();
        return \Illuminate\Support\Facades\Response::json($usuarios);
    }
}
