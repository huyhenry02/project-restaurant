<?php

namespace App\Http\Controllers\Customer;

use App\Modules\CategoryFood\Models\CategoryFood;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Requests\BookTableRequest;
use App\Modules\Menu\Models\Menu;
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

class CustomerController extends BaseController
{
    public function show_about_us(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.aboutUs');
    }

    public function show_booking_customer($table_type_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table_type = TableType::find($table_type_id);
        return view('customer.page.booking_customer',['table_type'=>$table_type]);
    }
    public function show_book(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table_type = TableType::all();
        return view('customer.page.booking',['table_type'=>$table_type]);
    }
    public function show_contact(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.contact');
    }

    public function show_list_customer(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $customerCount = Customer::count();
        $customer = Customer::all();
        return view('employee.page.customer.list', [
            'customer' => $customer,
            'customerCount' => $customerCount
        ]);
    }

    public function show_home(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table_type = TableType::all();
        $countCustomer = Customer::count();
        $countTable = TableType::count();
        $countReservation = Reservation::count();
        $countFood = Menu::count();
        return view('customer.page.home', [
            'table_type' => $table_type,
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
        $menuItem = Menu::all();
        $categories = CategoryFood::all();
        return view('customer.page.ourRestaurant',
            [
                'menuItem' => $menuItem,
                'categories' => $categories,
            ]);
    }

    public function show_our_table(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.page.table');
    }

    public function check_table(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservationDate = $request->input('reservation_date');
        $allTables = Table::all();
        $bookedTables = Reservation::where('reservation_date', $reservationDate)
            ->whereIn('status',['approved', 'processing','pending'])
            ->pluck('table_id')
            ->toArray();
        $bookedTablesCount = array_count_values($bookedTables);
        $remainingTables = [];
        foreach ($allTables as $table) {
            $tableId = $table->table_id;
            $totalTables = $table->amount;
            $bookedCount = $bookedTablesCount[$tableId] ?? 0;
            $remainingTables[$tableId] = $totalTables - $bookedCount;
        }
            $countCustomer = Customer::count();
            $countTable = Table::count();
            $countReservation = Reservation::count();
            $countFood = Menu::count();

            return view('customer.page.available', [
                'remainingTables' => $remainingTables,
                'countCustomer' => $countCustomer,
                'countTable' => $countTable,
                'countReservation' => $countReservation,
                'countFood' => $countFood,
                'allTables' => $allTables,
            ]);
    }

    public function book_table(Request $request): string
    {
        try {
            $tableTypeId = $request->input('table_type_id');
            $table_type = TableType::find($tableTypeId);
            $availableTables = Reservation::where('reservation_date', $request->input('reservation_date'))
                ->count();
            $totalTables = $table_type->amount;
            if ($availableTables >= $totalTables) {
                return redirect()->back()->with('error', 'Không còn bàn trống cho thời gian này.');
            }
            DB::beginTransaction();
            $customer = new Customer();
            $customer->fill($request->input());
            $customer->save();

            $reservation = new Reservation();
            $reservation->fill($request->input());
            $reservation->customer_id = $customer->customer_id;
            $reservation->time_out = $request->input('time') + 2;
            $reservation->save();

            $reservationId = $reservation->reservation_id;
            $reservation->name = 'D' . $reservationId;
            $reservation->save();
            DB::commit();
            return redirect()->back()->with('success', 'Đặt bàn thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi đặt bàn. Vui lòng thử lại sau.');
        }
    }
    public function destroy($id): RedirectResponse
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('show_list_customer.index')->with('success', 'Đã được xóa thành công!');
    }
}
