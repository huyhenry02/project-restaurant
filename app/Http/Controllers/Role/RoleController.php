<?php

namespace App\Http\Controllers\Role;

use App\Modules\Role\Models\Role;
use App\Modules\Role\Requests\CreateRoleRequest;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class RoleController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show_create_role(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.role.create');
    }

    public function show_list_role(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $role = Role::all();
        $roleCount = Role::count();
        return view('employee.page.role.list',['role'=>$role,'roleCount'=>$roleCount]);
    }

    public function create_role(CreateRoleRequest $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $role = new Role();
            $role->name = $validatedData['name'];
            $role->description = $validatedData['description'];
            $role->save();
            DB::commit();
            return redirect()->route('show_list_role.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
    public function destroy($id): RedirectResponse
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('show_list_role.index')->with('success', 'Đã được xóa thành công!');
    }
}
