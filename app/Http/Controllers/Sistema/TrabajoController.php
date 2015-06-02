<?php namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
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
        return view('pages/File');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function documentos()
    {
        return view('pages/Documentos');
    }
    public function save(Request $request)
    {

        $titulo = $request->titulo;
        //obtenemos el campo file definido en el formulario
        $file = $request->file('archivo');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        $public_path = public_path();
        $url = $public_path.'/storage/'.$nombre;
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
        \DB::insert('insert into trabajo (titulo, nombreArchivo, rutaArchivo, user_id)
                          values (?, ?, ?, ?)', [$titulo, $nombre, $url, Auth::user()->id]);
        return redirect('sistema/nuevotrabajo')->with(['success' => ' ']);
    }
}
