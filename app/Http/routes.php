<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::post('login', 'LoginController@LoginForm'); // Verificar datos
Route::get('logout', 'LoginController@getLogout');
Route::get('registro', 'LoginController@register');
Route::post('register', 'LoginController@RegisterForm');
route::get('sucesfullregister', 'LoginController@post_register');
route::get('calendar', 'FullCalendarController@getCalendar');
Route::post('calendar/getcalendar', 'FullCalendarController@calendarevents');
Route::any('/', array('as' => 'index', 'uses' => 'WelcomeController@index'));
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
#filtro para el perfil admin
Route::filter('is_admin', function()
{
    if(Auth::user()->type != 'Admin' ) return Redirect::to('/');
});
Route::group(['before' => 'is_admin', 'prefix'=> 'admin', 'namespace' => 'Admin'], function()
{
    Route::Resource('users', 'UsersController');
});
Route::group(['prefix'=> 'sistema', 'namespace' => 'Sistema'], function()
{
    Route::get('nuevotrabajo', 'TrabajoController@nuevotrabajo');
    Route::post('guardar', 'TrabajoController@save');
    Route::get('documentacion', 'TrabajoController@documentos');
    Route::get('find', 'TrabajoController@buscar');
    Route::get('storage/{archivo}', function ($archivo) {
        $public_path = public_path();
        $url = $public_path.'/storage/'.$archivo;
        //verificamos si el archivo existe y lo retornamos
        if (Storage::exists($archivo))
        {
            return response()->download($url);
        }
        //si no se encuentra lanzamos un error 404.
        abort(404);

    });
    Route::get('storage/Documentacion/{archivo}', function ($archivo) {
        $public_path = public_path();
        $url = $public_path.'/storage/'.$archivo;
        //verificamos si el archivo existe y lo retornamos
        if (Storage::exists($archivo))
        {
            return response()->download($url);
        }
        //si no se encuentra lanzamos un error 404.
        abort(404);

    });
});

