<?php

namespace App\Http\Controllers\Facility;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FacilityController extends BaseController
{
    public function show_create_facility(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.facility.create');
    }

    public function show_list_facility(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.facility.list');
    }
}
