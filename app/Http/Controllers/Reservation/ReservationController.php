<?php

namespace App\Http\Controllers\Reservation;

use App\Modules\Reservation\Models\Reservation;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

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
}
