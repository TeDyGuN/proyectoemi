<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller {

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
		$users = User::paginate();

        return view('admin.users.index', compact('users', 'eventos', 'datos'));
	}

	public function create()
	{
		//
	}
	public function store()
	{
		//
	}
	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
        $user = User::find($id);
        $user->delete();
        $message = $user->first_name.' '.$user->last_name.' fue eliminado de nuestros registros';
        return $message;
	}

}
