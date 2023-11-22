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
        return view('employee.page.table_item.create', ['table_type' => $table_type]);
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
    private function getReservedTables($reservationDate, $startTime, $endTime)
    {
        return Reservation::where('reservation_date', $reservationDate)
            ->when(!empty($startTime) && !empty($endTime), function ($query) use ($startTime, $endTime) {
                $query->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('time', [$startTime, $endTime])
                        ->orWhereBetween('time_out', [$startTime, $endTime])
                        ->orWhere(function ($query) use ($startTime, $endTime) {
                            $query->where('time', '<=', $startTime)
                                ->where('time_out', '>=', $endTime);
                        });
                });
            })->whereIn('status', ['approved', 'processing'])
            ->pluck('table_id');
    }

    private function getReservationInfo($tableId, $reservationDate, $startTime, $endTime, $reservedTables)
    {
        if ($reservedTables->contains($tableId)) {
            return Reservation::where('table_id', $tableId)
                ->where('reservation_date', $reservationDate)
                ->when(!empty($startTime) && !empty($endTime), function ($query) use ($startTime, $endTime) {
                    $query->where(function ($query) use ($startTime, $endTime) {
                        $query->whereBetween('time', [$startTime, $endTime])
                            ->orWhereBetween('time_out', [$startTime, $endTime])
                            ->orWhere(function ($query) use ($startTime, $endTime) {
                                $query->where('time', '<=', $startTime)
                                    ->where('time_out', '>=', $endTime);
                            });
                    });
                })
                ->select('status', 'time', 'time_out')
                ->first()
                ->toArray();
        }

        return ['status' => null, 'time' => null, 'time_out' => null];
    }

    public function check_table(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservationDate = $request->input('reservation_date');
        $startTime = $request->input('time');
        $endTime = $request->input('time_out');
        $tableCount = Table::count();

        $reservedTables = $this->getReservedTables($reservationDate, $startTime, $endTime);
        $checkedTable = Table::all();
        $tableStatuses = [];

        foreach ($checkedTable as $table) {
            $reservationInfo = $this->getReservationInfo($table->table_id, $reservationDate, $startTime, $endTime, $reservedTables);
            if ($reservationInfo['status'] == 'approved') {
                $tableStatuses[$table->table_id] = [
                    'status' => 'approved',
                    'time' => $reservationInfo['time'],
                    'time_out' => $reservationInfo['time_out']];
            } elseif ($reservationInfo['status'] == 'processing') {
                $tableStatuses[$table->table_id] = [
                    'status' => 'processing',
                    'time' => $reservationInfo['time'],
                    'time_out' => $reservationInfo['time_out']];
            } else {
                $tableStatuses[$table->table_id] = ['status' => 'table', 'time' => null];
            }
        }
        return view('employee.page.table_item.check', [
            'table' => $checkedTable,
            'tableCount' => $tableCount,
            'tableStatuses' => $tableStatuses,
            'reservationDate' => $reservationDate,
            'startTime' => $startTime,
            'endTime' => $endTime,
        ]);
    }

}
