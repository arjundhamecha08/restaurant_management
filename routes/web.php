<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('add-table', function () {
    return view('admin-dashboard.add-table');
})->name('add-table');

Route::get('admin', function () {
    return view('roles/admin');
})->name('admin');

Route::get('chef', function () {
    return view('roles/chef');
})->name('chef');

Route::get('waiter', function () {
    return view('roles/waiter');
})->name('waiter');

Route::get('cashier', function () {
    return view('roles/cashier');
})->name('cashier');

Route::get('manager', function () {
    return view('roles/manager');
})->name('manager');




Route::get('add-menu-item', [MenuController::class, 'show'])->name('add-menu-item');

Route::get('signup', [AuthController::class, 'signup'])->name('signup');

Route::post('signuppost', [AuthController::class,'signuppost'])->name('signup-post');

Route::get('login', [AuthController::class,'login'])->name('login');

Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::post('loginpost', [AuthController::class,'loginPost'])->name('login-post');

Route::get('manage-staffs', [AdminController::class, 'listStaffs'])->name('manage-staffs');

Route::get('remove-staff/{id}', [AdminController::class,'removeStaff'])->name('remove-staff');

Route::get("manage-menu",[MenuController::class,"index"])->name("menu-display");

Route::get("remove-menu/{id}", [MenuController::class,'delete'])->name('remove-menu');

Route::post('add', [MenuController::class,'create'])->name('menu.create');

// Route::get('add-table', [TableController::class, 'create'])->name('tables.create');

Route::post('add-table-post', [TableController::class, 'store'])->name('table-store');

Route::get('display-table',[TableController::class,'index'])->name('display-table');

Route::get('delete-table/{id}', [TableController::class, 'destroy'])->name('tables.destroy');

Route::get('add-order',[OrderController::class,'index'])->name('add-order');

Route::post('/add-order-post/{id}', [OrderController::class, 'store'])->name('add-number-post');

Route::get('manage-order',[OrderController::class,'show'])->name('manage-order');

Route::get('cancel-order/{id}',[OrderController::class,'delete'])->name('cancel-order');

Route::get('get-bills',[OrderController::class,'bill'])->name('bill');

Route::get('generate-bill/{table_number}',[OrderController::class,'generateBill'])->where('table_number', '.*')->name('generatebill');

Route::get('complete/{table_number}/{total}',[OrderController::class,'complete'])->where('table_number', '.*')->name('complete');

Route::get('view-report',[OrderController::class,'viewReport'])->name('view-report');