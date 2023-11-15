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

class TableController extends BaseController
{

    public function show_create_table_type(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.table.create');
    }

    public function show_list_table_type(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table_type = TableType::all();
        $tableCount = TableType::count();
        return view('employee.page.table.list',
            [
                'table_type' => $table_type,
                'tableCount' => $tableCount,
            ]);
    }

    public function create_table_type(Request $request)
    {
        try {
            DB::beginTransaction();
            $table_type = new TableType();
            $table_type->name = $request['name'];
            $table_type->description = $request['description'];
            $table_type->amount = $request['amount'];
            $table_type->save();
            DB::commit();
            return redirect()->route('show_list_table_type.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function count_table_type(Request $request): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $reservationDate = $request->input('reservation_date');
        $tableItems = Table::all();
        $availableTableCounts = [];
        foreach ($tableItems as $tableType) {
            $count = Reservation::where('reservation_date', $reservationDate)
                ->where('table_id', $tableType->table_id)
                ->whereIn('status',['approved', 'completed', 'processing'])
                ->count();
            $availableTableCounts[$tableType->name] = $tableType->amount - $count;
        }
        return view('employee.page.table.count', [
            'availableTableCounts' => $availableTableCounts,
            'tableItems'=>$tableItems,
            'reservationDate' => $reservationDate]);
    }
    public function destroy($id): RedirectResponse
    {
        $table = TableType::find($id);
        $table->delete();
        return redirect()->route('show_list_table_type.index')->with('success', 'Đã được xóa thành công!');
    }
}
