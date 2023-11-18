<?php

namespace App\Http\Controllers\Auth;

use App\Modules\Customer\Models\Customer;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthCustomerController extends BaseController
{
    public function show_login_customer(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.login');
    }
    public function show_register_customer(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.register');
    }
    public function register_customer(Request $request)
    {
        try {
            $customer = new Customer();
            $customer->fill($request->input());
            $customer->password = bcrypt($request->input('password'));
            $customer->save();
            return redirect()->route('show_login_customer.index')->with('success','Cảm ơn bạn đã đăng ký là khách hàng thân thiết');
        }catch (Exception $e){
            dd($e->getMessage());
        }
    }
    public function login_customer(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('customer')->attempt($credentials)) {
                return redirect()->route('show_home.index');
            } else {
                return redirect()->route('show_home.index')->with('error', 'Invalid credentials');
            }
        } catch (Exception $e){
            dd($e->getMessage());
        }
    }

    public function logout_customer(): RedirectResponse
    {
        Auth::guard('customer')->logout();
        return redirect()->route('show_login_customer.index');

    }
}
