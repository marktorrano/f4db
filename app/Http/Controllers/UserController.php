<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * login()
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function login(Request $request)
    {
        $username = $request->input('username');
        $error = null;

        if (request()->isMethod('post')) {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]);

            $password = $request->input('password');

            if ($res = Auth::attempt(['login' => $username, 'password' => $password])) {
                if (!function_exists('user')) {
                    /**
                     * user()
                     */
                    function user()
                    {
                        return app('auth')->user();
                    }
                }
                if (user()->canLogin()) {
                    return redirect()->intended('/');
                }

                $error = 'Login failed. You are not allowed to login.';
            } else {
                $error = 'Login failed. Invalid username or password.';
            }
        }

        return view('pages.login', [
            'username' => $username,
            'error'    => $error,
        ]);
    }

    /**
     * logout()
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {

        Auth::logout();

        return redirect()->intended('/');
    }
}
