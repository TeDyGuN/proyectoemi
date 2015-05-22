<?php
/**
 * Created by PhpStorm.
 * User: Ted Carrasco C
 * Date: 5/21/2015
 * Time: 11:06 p.m.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class LoginController extends Controller{
    protected $registrar;
    public function LoginForm(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]))
        {
            return Redirect::intended('/home');
        }
        return Redirect::back()->with('error_message', 'Invalid data')->withInput();
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function RegisterForm(Request $request)
    {
        $credentials = $request->only('first_name', 'last_name', 'email', 'password', 'password_confirmation', 'type' ,'_token');
        $validator = Validator::make($credentials,
            [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6'
            ]
        );
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $request['password'] = bcrypt($request['password']);
        $user = new User($request->all());
        $user->save();
        return view('sucesfullregister');
    }
}