<?php

namespace App\Http\Controllers\User;

use App\Modules\Employee\Models\Employee;
use App\Modules\Employee\Requests\CreateEmployeeRequest;
use App\Modules\Role\Models\Role;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show_create_employee(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $role = Role::all();
        return view('employee.page.user.create',['role'=>$role]);
    }
    public function show_index_admin(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.index');
    }

    public function show_list_employee(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employee = Employee::all();
        $employeeCount = Employee::count();
        return view('employee.page.user.list',
            [
                'employee' => $employee,
                'employeeCount' => $employeeCount,
            ]);
    }

    public function create_employee(Request $request)
    {
        try {
            DB::beginTransaction();
            $employee = new Employee();
            $employee->name = $request['name'];
            $employee->address = $request['address'];
            $employee->email = $request['email'];
            $employee->phone = $request['phone'];
            $employee->role_id = $request['role_id'];
            if ($employee->role_id == 1 || $employee->role_id == 4) {
                $employee->password = bcrypt('admin1234');
            } else {
                $employee->password = null;
            }
            $employee->save();
            DB::commit();
            return redirect()->route('show_list_employee.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
    public function destroy($id): RedirectResponse
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('show_list_employee.index')->with('success', 'Đã được xóa thành công!');
    }
}
