<?php

namespace App\Http\Controllers\Table;

use App\Modules\Table\Models\Table;
use App\Modules\Table\Requests\CreateTableRequest;
use Exception;
use http\Client\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class TableController extends BaseController
{
    public function show_create_table(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.table.create');
    }

    public function show_list_table(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table = Table::all();
        return view('employee.page.table.list',['table'=>$table]);
    }
    public function create_table(CreateTableRequest $request){
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $role = new Table();
            $role->name = $validatedData['name'];
            $role->description = $validatedData['description'];
            $role->amount = $validatedData['amount'];
            $role->save();
            DB::commit();
            return redirect()->route('show_list_table.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
