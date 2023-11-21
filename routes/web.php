<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthCustomerController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Example\ExampleController;
use App\Http\Controllers\Facility\FacilityController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Table\TableController;
use App\Http\Controllers\Table\TableItemController;
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
//auth admin
Route::prefix('auth_admin')->group(function (){
    Route::get('/show_login', [AuthController::class, 'show_login_admin'])->name('show_login.index');
    Route::post('/login', [AuthController::class, 'login_admin'])->name('login.post');
});
//auth customer
Route::prefix('auth_customer')->group(function (){
    Route::get('/show_login', [AuthCustomerController::class, 'show_login_customer'])->name('show_login_customer.index');
    Route::get('/show_register', [AuthCustomerController::class, 'show_register_customer'])->name('show_register_customer.index');
    Route::get('/logout_customer', [AuthCustomerController::class, 'logout_customer'])->name('logout_customer.post');
    Route::post('/login', [AuthCustomerController::class, 'login_customer'])->name('login_customer.post');
    Route::post('/register_customer', [AuthCustomerController::class, 'register_customer'])->name('register_customer.post');
});
//customer
Route::prefix('customer')->group(function () {

    Route::get('/show_about_us', [CustomerController::class, 'show_about_us'])->name('show_about_us.index');
    Route::get('/show_booking/{table_type_id}', [CustomerController::class, 'show_booking_customer'])->name('show_booking.index');
    Route::get('/show_book', [CustomerController::class, 'show_book'])->name('show_book.index');
    Route::get('/show_contact', [CustomerController::class, 'show_contact'])->name('show_contact.index');
    Route::get('/show_history_reservation', [CustomerController::class, 'show_history_reservation'])->name('show_history_reservation.index')->middleware('auth:customer');
    Route::get('/show_home', [CustomerController::class, 'show_home'])->name('show_home.index');
    Route::get('/show_offer', [CustomerController::class, 'show_offer'])->name('show_offer.index');
    Route::get('/show_our_restaurant', [CustomerController::class, 'show_our_restaurant'])->name('show_our_restaurant.index');
    Route::get('/show_our_table', [CustomerController::class, 'show_our_table'])->name('show_our_table.index');

    Route::post('/book_table', [CustomerController::class, 'book_table'])->name('book_table.post');
    Route::post('/book_table_customer', [CustomerController::class, 'book_table_customer'])->name('book_table_customer.post')->middleware('auth:customer');
    Route::post('/create_message', [MessageController::class, 'create_message'])->name('create_message.post');

});
//admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'show_index_admin'])->name('show_index_admin.index');
    Route::get('logout',[AuthController::class, 'logout_admin'])->name('logout.admin');
    //role
    Route::prefix('role')->group(function (){
        //show
        Route::get('/show_create_role', [RoleController::class, 'show_create_role'])->name('show_create_role.index');
        Route::get('/show_list_role', [RoleController::class, 'show_list_role'])->name('show_list_role.index');
        //action
        Route::post('/create_role', [RoleController::class, 'create_role'])->name('create_role.post');
        Route::get('/delete_role/{role_id}', [RoleController::class, 'destroy'])->name('role.delete');
    });
    //message
    Route::prefix('message')->group(function (){
        //show
        Route::get('/show_list_message', [MessageController::class, 'show_list_message'])->name('show_list_message.index');
    });
    //employee
    Route::prefix('employee')->group(function (){
        //show
        Route::get('/show_create_employee', [UserController::class, 'show_create_employee'])->name('show_create_employee.index');
        Route::get('/show_list_employee', [UserController::class, 'show_list_employee'])->name('show_list_employee.index');
        //action
        Route::post('/create_employee', [UserController::class, 'create_employee'])->name('create_employee.post');
        Route::get('/delete_employee/{employee_id}', [UserController::class, 'destroy'])->name('employee.delete');
    });
    //customer
    Route::prefix('customer')->group(function (){
        //show
        Route::get('/show_list_customer', [CustomerController::class, 'show_list_customer'])->name('show_list_customer.index');
        Route::get('/show_history_customer/{customer_id}', [CustomerController::class, 'show_history_customer'])->name('show_history_customer.index');
        //action
        Route::get('/delete_customer/{customer_id}', [CustomerController::class, 'destroy'])->name('customer.delete');

    });
    //facility
    Route::prefix('facility')->group(function (){
        ////show
        Route::get('/show_create_facility', [FacilityController::class, 'show_create_facility'])->name('show_create_facility.index');
        Route::get('/show_list_facility', [FacilityController::class, 'show_list_facility'])->name('show_list_facility.index');
        //action
        Route::get('/delete_facility/{facility_id}', [FacilityController::class, 'facility'])->name('facility.delete');
    });
    //menu
    Route::prefix('menu')->group(function (){
       //show
        Route::get('/show_create_menu', [MenuController::class, 'show_create_menu'])->name('show_create_menu.index');
        Route::get('/show_edit_menu/{menu_id}', [MenuController::class, 'show_edit_menu'])->name('show_edit_menu.index');
        Route::get('/show_list_menu', [MenuController::class, 'show_list_menu'])->name('show_list_menu.index');
        //action
        Route::post('/create_menu', [MenuController::class, 'create_menu'])->name('create_menu.post');
        Route::post('/update_menu/{menu_id}', [MenuController::class, 'update_menu'])->name('update_menu.post');
        Route::get('/delete_menu/{menu_id}', [MenuController::class, 'destroy'])->name('menu.delete');
    });
    //order
    Route::prefix('order')->group(function (){
        ////show
        Route::get('/show_create_order', [OrderController::class, 'show_create_order'])->name('show_create_order.index');
        Route::get('/show_list_order', [OrderController::class, 'show_list_order'])->name('show_list_order.index');
        Route::get('/show_update_order/{order_id}', [OrderController::class, 'show_update_order'])->name('show_update_order.index');
        //action
        Route::get('/delete_order/{order_id}', [OrderController::class, 'destroy'])->name('order.delete');
        Route::post('/update_order/{order_id}', [OrderController::class, 'update_order'])->name('update_order.post');
    });
    //reservation
    Route::prefix('reservation')->group(function (){
        ///show
        Route::get('/show_create_reservation', [ReservationController::class, 'show_create_reservation'])->name('show_create_reservation.index');
        Route::get('/show_list_reservation', [ReservationController::class, 'show_list_reservation'])->name('show_list_reservation.index');
        Route::get('/show_update_reservation/{reservation_id}', [ReservationController::class, 'show_update_reservation'])->name('show_update_reservation.index');
        //action
        Route::get('/delete_reservation/{reservation_id}', [ReservationController::class, 'destroy'])->name('reservation.delete');
        Route::post('/update_reservation/{reservation_id}', [ReservationController::class, 'update_reservation'])->name('update_reservation.post');
        Route::post('/filterReservations', [ReservationController::class, 'filterReservations'])->name('filterReservations.post');

    });
    //table_type
    Route::prefix('table_type')->group(function (){
        //show
        Route::get('/show_create_table_type', [TableController::class, 'show_create_table_type'])->name('show_create_table_type.index');
        Route::get('/show_list_table_type', [TableController::class, 'show_list_table_type'])->name('show_list_table_type.index');
        //action
        Route::post('/create_table_type', [TableController::class, 'create_table_type'])->name('create_table_type.post');
        Route::post('/countTable_type', [TableController::class, 'count_table_type'])->name('count_table_type.post');
        Route::get('/delete_table_type/{table_type_id}', [TableController::class, 'destroy'])->name('table_type.delete');
    });
    //tableItem
    Route::prefix('tableItem')->group(function (){
        //show
        Route::get('/show_create_table', [TableItemController::class, 'show_create_table'])->name('show_create_table.index');
        Route::get('/show_list_table', [TableItemController::class, 'show_list_table'])->name('show_list_table.index');
        //action
        Route::post('/create_table', [TableItemController::class, 'create_table'])->name('create_table.post');
        Route::post('/check_table', [TableItemController::class, 'check_table'])->name('check_table.post');
        Route::get('/delete_table/{table_id}', [TableItemController::class, 'destroy'])->name('table_type.delete');
    });

});

