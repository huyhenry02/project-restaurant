<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
      public  function  show_login(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
      {
          return view('employee.auth.login');
      }
}
