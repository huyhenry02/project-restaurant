<?php

namespace App\Http\Controllers\Order;

use App\Modules\Order\Models\Order;
use App\Modules\Table\Models\Table;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
    public function show_create_order(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.order.create');
    }

    public function show_list_order(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $order = Order::all();
        $orderCount = Order::count();
        return view('employee.page.order.list',
            [
                'order' => $order,
                'orderCount' => $orderCount,
            ]);
    }
    public function destroy($id): RedirectResponse
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('show_list_order.index')->with('success', 'Đã được xóa thành công!');
    }
    public function show_update_order($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $order = Order::find($id);
        $table = Table::all();
        return view('employee.page.order.edit',['order'=>$order, 'table'=>$table]);
    }
}
