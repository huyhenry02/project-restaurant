<?php

namespace App\Http\Controllers\Order;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
    public function show_create_order(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.order.create');
    }

    public function show_list_order(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.order.list');
    }
}
