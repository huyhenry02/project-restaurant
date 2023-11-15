<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function show_login(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.auth.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('show_list_order.index');
            } else {
                return redirect()->route('show_login.index')->with('error', 'Invalid credentials');
            }
        } catch (Exception $e){
            dd($e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show_login.index');

    }
}
