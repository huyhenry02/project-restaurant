<?php

namespace App\Http\Controllers\Customer;

use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Requests\BookTableRequest;
use App\Modules\Menu\Models\Menu;
use App\Modules\Reservation\Models\Reservation;
use App\Modules\Table\Models\Table;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class CustomerController extends BaseController
{
    public function show_about_us(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.aboutUs');
    }

    public function show_booking_customer(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.booking_customer');
    }
    public function show_booking_table(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.booking_table');
    }
    public function show_contact(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.contact');
    }

    public function show_home(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table = Table::all();
        $countCustomer = Customer::count();
        $countTable = Table::count();
        $countReservation = Reservation::count();
        $countFood = Menu::count();
        return view('customer.page.home', [
            'table' => $table,
            'countCustomer' => $countCustomer,
            'countTable' => $countTable,
            'countReservation' => $countReservation,
            'countFood' => $countFood,
        ]);
    }

    public function show_offer(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.offer');
    }

    public function show_our_restaurant(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.ourRestaurant');
    }

    public function show_our_table(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.table');
    }

    public function check_table(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservationDate = $request->input('reservation_date');
        $time = $request->input('time');
        $tableId = $request->input('table_id');

        $availableTables = Reservation::where('reservation_date', $reservationDate)
            ->where('table_id', $tableId)
            ->where('time', $time)
            ->where('status', 'approved')
            ->count();
        if ($availableTables > 0) {
            $table = Table::where('table_id', $tableId)->first();
            $countCustomer = Customer::count();
            $countTable = Table::count();
            $countReservation = Reservation::count();
            $countFood = Menu::count();
            return view('customer.page.available', [
                'table' => $table,
                'countCustomer' => $countCustomer,
                'countTable' => $countTable,
                'countReservation' => $countReservation,
                'countFood' => $countFood,
            ]);
        }
        $table = Table::all();
        $countCustomer = Customer::count();
        $countTable = Table::count();
        $countReservation = Reservation::count();
        $countFood = Menu::count();
        return view('customer.page.no_available', [
            'table' => $table,
            'reservationDate' => $reservationDate,
            'time' => $time,
            'countCustomer' => $countCustomer,
            'countTable' => $countTable,
            'countReservation' => $countReservation,
            'countFood' => $countFood,
        ]);
    }
    public function book_table(BookTableRequest $request): \Illuminate\Contracts\Foundation\Application|View|Application|Factory
    {
//        dd(111);
        try {
            DB::beginTransaction();
            $customer = new Customer();
            $customer->fill($request->input());
            $customer->save();

            $reservation = new Reservation();
            $reservation->fill($request->input());
            $reservation->table_id =  $request->route('table_id');
            $reservation->name = 'Booking-' . time();
            $reservation->customer_id = $customer->customer_id;
            $reservation->save();
            DB::commit();
            return view('customer.page.home');
        }catch (Exception $e){
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
