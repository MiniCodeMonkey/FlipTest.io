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

    public function postRegister()
    {
        $rules = array(
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'app_name' => 'required|unique:apps,name',
            'app_identifier' => 'required|unique:apps,identifier',
        );

        $validator = Validator::make(Input::all(), $rules);

        // Redirect back
        if ($validator->fails())
        {
            return Redirect::to('start')->withErrors($validator);
        }

        // Create user
        $user = new User;
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        // Create app
        $app = new TestApp;
        $app->user_id = $user->id;
        $app->name = Input::get('app_name');
        $app->identifier = Input::get('app_identifier');
        $app->save();

        // Login & redirect
        Auth::login($user);
        return Redirect::to('apps');
    }

    public function postLearn()
    {
        $rules = array(
            'email' => 'required|email|unique:users'
        );

        $validator = Validator::make(Input::all(), $rules);

        // Redirect back
        if ($validator->fails())
        {
            return Redirect::to('learn')->withErrors($validator);
        }

        // Create user
        $user = new User;
        $user->email = Input::get('email');
        $user->password = Hash::make('notyet');
        $user->save();

        return Redirect::to('learn')
            ->with('registered', true);
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

    public function getUserkey()
    {
        // Just proof of concept
        return Response::json(array('key' => Str::upper(Str::random(9) . '-' . Str::random(21) . '-' . Str::random(13))));
    }

}