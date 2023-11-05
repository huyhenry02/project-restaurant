<?php

namespace App\Http\Controllers\User;

use App\Modules\Employee\Models\Employee;
use App\Modules\Employee\Requests\CreateEmployeeRequest;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function show_create_employee(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.user.create');
    }
    public function show_list_employee(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.user.list');
    }

    public function create_employee(CreateEmployeeRequest $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $employee = new Employee();
            $employee->name = $validatedData['name'];
            $employee->address = $validatedData['address'];
            $employee->email = $validatedData['email'];
            $employee->phone = $validatedData['phone'];
            $employee->save();
            DB::commit();
            return redirect()->route('show_list_employee.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}