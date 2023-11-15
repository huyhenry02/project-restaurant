<?php

namespace App\Http\Controllers\Menu;

use App\Modules\CategoryFood\Models\CategoryFood;
use App\Modules\Menu\Models\Menu;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class MenuController extends BaseController
{
    public function show_create_menu(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = CategoryFood::all();
        return view('employee.page.menu.create',['category'=>$category]);
    }
    public function show_edit_menu($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $menu = Menu::find($id);
        $category = CategoryFood::all();
        return view('employee.page.menu.create',['category'=>$category, 'menu'=>$menu]);
    }

    public function show_list_menu(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $menu = Menu::all();
        $menuCount = Menu::count();
        return view('employee.page.menu.list',['menu'=>$menu,'menuCount'=>$menuCount]);
    }
    public function destroy($id): RedirectResponse
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('show_list_menu.index')->with('success', 'Đã được xóa thành công!');
    }
    public function create_menu(Request $request)
    {
        try {
            DB::beginTransaction();
            $menu = new Menu();
            $menu->item_name = $request['item_name'];
            $menu->description = $request['description'];
            $menu->price = $request['price'];
            $menu->category_id = $request['category_id'];
            $menu->save();
            DB::commit();
            return redirect()->route('show_list_menu.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
    public function update_menu(Request $request,$id): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $menu = Menu::find($id);
            $menu->update([
                'item_name' => $request->input('item_name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
            ]);
            DB::commit();
            return redirect()->route('show_list_menu.index');
        }catch (Exception $e)
        {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
