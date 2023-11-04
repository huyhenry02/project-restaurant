<?php

namespace App\Http\Controllers\Example;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ExampleController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function example()
    {
        return null;
    }
}
