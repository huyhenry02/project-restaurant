<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Example\ExampleController;
use App\Http\Controllers\Facility\FacilityController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Table\TableController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('show_home.index');
});
Route::get('/example', [ExampleController::class, 'example'])->name('example');
//customer
Route::prefix('customer')->group(function () {
    Route::get('/show_about_us', [CustomerController::class, 'show_about_us'])->name('show_about_us.index');
    Route::get('/show_booking', [CustomerController::class, 'show_booking'])->name('show_booking.index');
    Route::get('/show_contact', [CustomerController::class, 'show_contact'])->name('show_contact.index');
    Route::get('/show_home', [CustomerController::class, 'show_home'])->name('show_home.index');
    Route::get('/show_offer', [CustomerController::class, 'show_offer'])->name('show_offer.index');
    Route::get('/show_our_restaurant', [CustomerController::class, 'show_our_restaurant'])->name('show_our_restaurant.index');
    Route::get('/show_our_table', [CustomerController::class, 'show_our_table'])->name('show_our_table.index');
});
//admin
Route::prefix('admin')->group(function () {
    //role
    Route::prefix('role')->group(function (){
        Route::get('/show_create_role', [RoleController::class, 'show_create_role'])->name('show_create_role.index');
        Route::get('/show_list_role', [RoleController::class, 'show_list_role'])->name('show_list_role.index');
        Route::post('/create_role', [RoleController::class, 'create_role'])->name('create_role.post');
    });
    //employee
    Route::prefix('employee')->group(function (){
        Route::get('/show_create_employee', [UserController::class, 'show_create_employee'])->name('show_create_employee.index');
        Route::get('/show_list_employee', [UserController::class, 'show_list_employee'])->name('show_list_employee.index');
        Route::post('/create_employee', [UserController::class, 'create_employee'])->name('create_employee.post');
    });
    //facility
    Route::prefix('facility')->group(function (){
        Route::get('/show_create_facility', [FacilityController::class, 'show_create_facility'])->name('show_create_facility.index');
        Route::get('/show_list_facility', [FacilityController::class, 'show_list_facility'])->name('show_list_facility.index');
    });
    //menu
    Route::prefix('menu')->group(function (){
        Route::get('/show_create_menu', [MenuController::class, 'show_create_menu'])->name('show_create_menu.index');
        Route::get('/show_list_menu', [MenuController::class, 'show_list_menu'])->name('show_list_menu.index');
    });
    //order
    Route::prefix('order')->group(function (){
        Route::get('/show_create_order', [OrderController::class, 'show_create_order'])->name('show_create_order.index');
        Route::get('/show_list_order', [OrderController::class, 'show_list_order'])->name('show_list_order.index');
    });
    //reservation
    Route::prefix('reservation')->group(function (){
        Route::get('/show_create_reservation', [ReservationController::class, 'show_create_reservation'])->name('show_create_reservation.index');
        Route::get('/show_list_reservation', [ReservationController::class, 'show_list_reservation'])->name('show_list_reservation.index');
    });
    //table
    Route::prefix('table')->group(function (){
        Route::get('/show_create_table', [TableController::class, 'show_create_table'])->name('show_create_table.index');
        Route::get('/show_list_table', [TableController::class, 'show_list_table'])->name('show_list_table.index');
        Route::post('/create_table', [TableController::class, 'create_table'])->name('create_table.post');
    });

});

