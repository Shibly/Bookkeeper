<?php

class AuthController extends BaseController
{

    public function getRegister()
    {
        return View::make('auth.register');
    }

    public function postRegister()
    {

        $input = Input::all();

        $v = Validator::make($input, User::$rules);

        if ($v->passes()) {
            $user = new User;

            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('login');

        }

        return Redirect::to('register')->withErrors($v);
    }

    public function getLogin()
    {
        return View::make('auth.login');
    }

    public function postLogin()
    {

        $input = Input::all();

        $rules = array('email' => 'required', 'password' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {
            $credentials = array('email' => Input::get('email'), 'password' => Input::get('password'));

            if (Auth::attempt($credentials)) {

                return Redirect::to('admin');

            } else {

                return Redirect::to('login');
            }
        }

        return Redirect::to('login')->withErrors($v);

    }

    /**
     * @return the edit form for currently logged in user
     */
    public function editUser()
    {
        $user = User::find(Auth::user()->id);
        return View::make('admin.edit')->with('user', $user);
    }


    /**
     * @return update the current users profile
     */
    public function updateUser($id)
    {
        $input = Input::all();
        $v = Validator::make($input, User::$rules);
        if ($v->passes()) {
            $user = User::find($id);
            $user->username = Input::get('username');
            $user->fullname = Input::get('fullname');
            $user->phonenumber = Input::get('phonenumber');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            return Redirect::to('admin');
        }
        return Redirect::back()->withErrors($v);
    }

    public function logout()
    {

        Auth::logout();
        return Redirect::to('/');
    }

}
