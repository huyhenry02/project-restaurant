<?php

namespace App\Http\Controllers\Table;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modules\Table\Models\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Modules\Table\Models\TableType;
use App\Modules\Reservation\Models\Reservation;
use Illuminate\Routing\Controller as BaseController;

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
            $table_type->fill($request->all());
            $table_type->save();
            for ($i = 1; $i <= $request->amount; $i++) {
                $table = new Table();
                $table->table_type_id = $table_type->table_type_id;
                $table->name = $table_type->code . '0' . $i;
                $table->save();
            }
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
        $table->reservations()->delete();
        $table->tables()->delete();
        $table->delete();
        return redirect()->route('show_list_table_type.index')->with('success', 'Đã được xóa thành công!');
    }
}
