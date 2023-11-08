<?php

namespace App\Http\Controllers\Table;

use App\Modules\Reservation\Models\Reservation;
use App\Modules\Table\Models\Table;
use App\Modules\Table\Requests\CreateTableRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
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
        return view('employee.page.table.list', ['table' => $table]);
    }

    public function create_table(CreateTableRequest $request)
    {
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

    public function count_table(Request $request): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $reservationDate = $request->input('reservation_date');
        $tableItems = Table::with('reservations')->get();
        $availableTableCounts = [];
        foreach ($tableItems as $tableType) {
            $count = Reservation::where('reservation_date', $reservationDate)
                ->where('status', 'approved')
                ->count();
            $availableTableCounts[$tableType->name] = $tableType->amount - $count;
        }
        return view('employee.page.table.count', [
            'availableTableCounts' => $availableTableCounts,
            'tableItems'=>$tableItems,
            'reservationDate' => $reservationDate]);
    }
}
