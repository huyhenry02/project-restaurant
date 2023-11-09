<?php

namespace App\Http\Controllers\Menu;

use App\Modules\Menu\Models\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class MenuController extends BaseController
{
    public function show_create_menu(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.menu.create');
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
}
