<?php

namespace App\Http\Controllers\Table;

use App\Modules\Reservation\Models\Reservation;
use App\Modules\Table\Models\Table;
use App\Modules\Table\Models\TableType;
use App\Modules\Table\Requests\CreateTableRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class TableItemController extends BaseController
{

    public function show_create_table(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table_type = TableType::all();
        return view('employee.page.table_item.create',['table_type'=>$table_type]);
    }

    public function show_list_table(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table = Table::all();
        $tableCount = Table::count();
        return view('employee.page.table_item.list',
            [
                'table' => $table,
                'tableCount' => $tableCount,
            ]);
    }

    public function create_table(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = new Table();
            $table->name = $request['name'];
            $table->table_type_id = $request['table_type_id'];
            $table->save();
            DB::commit();
            return redirect()->route('show_list_table.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function destroy($id): RedirectResponse
    {
        $table = TableType::find($id);
        $table->delete();
        return redirect()->route('show_list_table.index')->with('success', 'Đã được xóa thành công!');
    }
}
