<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends AdminController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.index');
    }

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        if ($request->input('email') && $request->input('password')) {

            $user = User::where('email', $request->input('email'))->where('password', md5($request->input('password')))->get();

            if ($user) {
                Auth::login($user->first(), true);
                return redirect('admin');
            }

        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
