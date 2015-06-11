<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class UsersController extends Controller {

	public function index()
	{
		$users = User::paginate();
        return view('admin.users.index', compact('users'));
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
