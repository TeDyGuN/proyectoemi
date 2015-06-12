<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
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
		return view('home', compact('datos', 'eventos'));
	}

}
