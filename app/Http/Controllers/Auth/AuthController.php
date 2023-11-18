<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function show_login_admin(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.auth.login');
    }


    public function login_admin(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('web')->attempt($credentials)) {
                return redirect()->route('show_index_admin.index');
            } else {
                return redirect()->route('show_login.index')->with('error', 'Invalid credentials');
            }
        } catch (Exception $e){
            dd($e->getMessage());
        }
    }

    public function logout_admin(): RedirectResponse
    {
        Auth::guard('web')->logout();
        return redirect()->route('show_login.index');

    }
}
