<?php

namespace App\Http\Controllers\Order;

use App\Modules\Menu\Models\Menu;
use App\Modules\Order\Models\Order;
use App\Modules\OrderDetail\Models\OrderDetail;
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

class OrderController extends BaseController
{
    public function show_create_order(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table_type = TableType::all();
        $table = Table::all();
        return view('employee.page.order.create', [
            'table_type' => $table_type,
            'table' => $table,
        ]);
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
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        $table = Table::all();
        $table_type = TableType::all();
        $menu = Menu::all();
        return view('employee.page.order.edit',
            [
                'order' => $order,
                'table_type' => $table_type,
                'table' => $table,
                'orderDetails' => $orderDetails,
                'menu' => $menu,
            ]);
    }
    public function update_order(Request $request,$id): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            $order->customer->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);
            $order->update([
                'order_date' => $request->input('order_date'),
                'time' => $request->input('time'),
                'table_id' => $request->input('table_id'),
            ]);
            foreach ($request->input('item_name') ?? [] as $index => $itemName) {
                if (isset($request->input('order_detail_id')[$index])) {
                    $detail = OrderDetail::find($request->input('order_detail_id')[$index]);
                    $detail->update([
                        'menu_id' => $request->input('menu_id')[$index],
                        'quantity' => $request->input('quantity')[$index],
                    ]);
                } else {
                    OrderDetail::create([
                        'order_id' => $id,
                        'menu_id' => $request->input('menu_id')[$index],
                        'quantity' => $request->input('quantity')[$index],
                    ]);
                }
            }
            $totalAmount = $order->order()->sum(DB::raw('menus.price * quantity'));
            $order->update([
                'total_amount' => $totalAmount,
            ]);

            DB::commit();
            return redirect()->route('show_update_order.index');
        }catch (Exception $e)
        {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
