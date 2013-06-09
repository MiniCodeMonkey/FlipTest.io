<?php

class AuthController extends BaseController {

    public function postLogin()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
            return Redirect::intended('apps');
        } else {
            return Redirect::to('auth/login')->with('auth_error', true);
        }
    }

    public function getLogin()
    {
        return View::make('auth.login');
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::to('/');
    }

}