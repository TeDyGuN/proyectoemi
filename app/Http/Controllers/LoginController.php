<?php
/**
 * Created by PhpStorm.
 * User: Ted Carrasco C
 * Date: 5/21/2015
 * Time: 12:44 a.m.
 */

namespace App\Http\Controllers;


class LoginController {
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect()->route('/');
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'Los campos son Incorrectos';
    }
}