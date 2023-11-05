<?php

use App\Http\Controllers\Example\ExampleController;
use App\Http\Controllers\Role\RoleController;
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
    return view('welcome');
});
Route::get('/example', [ExampleController::class, 'example'])->name('example');
//Page
Route::prefix('page')->group(function () {
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

});
