<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Show user index
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('users.index');
    }

    /**
     * Show user page
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers()
    {
        return view('users.user');
    }

    /**
     * Show profile page
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile()
    {
        return view('users.profile', ['user' => Auth::user()]);
    }

    public function updateUser(Request $request, $account)
    {
        $id = $request->input('pk');
        $name = $request->input('name');
        $value = $request->input('value');

        $user = \App\User::find(Auth::user()->id);
        $user[$name] = $value;
        $user->save();

        return array('success' => 'true');
    }

    public function updateUserPassword(Request $request, $account)
    {
        $id = Auth::user()->id;
        $password = $request->input('password');
        $confirm = $request->input('confirm');

        if (strlen($password) && ($password == $confirm)) {
            $user = \App\User::find($id);
            $user->password = $password;
            $user->save();

            Session::flash('notify-success', 'Password was updated.');
        } else {
            Session::flash('notify-failure', 'Passwords did not match or were invalid. Try again.');
        }

        return redirect('/profile');
    }
}
