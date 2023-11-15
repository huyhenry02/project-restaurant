<?php

namespace App\Http\Controllers\Reservation;

use App\Modules\Reservation\Models\Reservation;
use App\Modules\Table\Models\Table;
use App\Modules\Table\Models\TableType;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class ReservationController extends BaseController
{
    public function show_create_reservation(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.reservation.create');
    }

    public function show_list_reservation(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservationCount = Reservation::count();
        $reservation = Reservation::all();
        return view('employee.page.reservation.list', [
            'reservation'=>$reservation,
            'reservationCount'=>$reservationCount
        ]);
    }
    public function destroy($id): RedirectResponse
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->route('show_list_reservation.index')->with('success', 'Đã được xóa thành công!');
    }
    public function show_update_reservation($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservation = Reservation::find($id);
        $table = Table::all();
        $table_type = TableType::all();
        $status = Reservation::all();
        return view('employee.page.reservation.edit',[
            'reservation'=>$reservation,
            'table'=>$table,
            'table_type'=>$table_type,
            'status'=>$status
        ]);
    }
    public function update_reservation(Request $request,$id): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $reservation = Reservation::find($id);
            $reservation->customer->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);

            $reservation->update([
                'reservation_date' => $request->input('reservation_date'),
                'time' => $request->input('time'),
                'number_of_guests' => $request->input('number_of_guests'),
                'status' => $request->input('status'),
                'table_id' => $request->input('table_id'),
                'note' => $request->input('note'),
            ]);
            DB::commit();
            return redirect()->route('show_list_reservation.index');
        }catch (Exception $e)
        {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
