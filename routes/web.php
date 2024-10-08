<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\CustomerController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('home.index');
});

Route::middleware('superadmin')->group(function () {
    Route::get('/super-admin-dashboard', [SuperAdminDashboardController::class, 'index'])->name('super-admin');

    Route::get('/super-admin-dashboard/admin/table', [UserController::class, 'index'])->name('admin-table');
    Route::get('/super-admin-dashboard/admin/add', [UserController::class, 'create'])->name('admin-add');
    Route::post('/super-admin-dashboard/admin/add', [UserController::class, 'store'])->name('admin-store');
    Route::get('/super-admin-dashboard/admin/edit/{id}', [UserController::class, 'edit'])->name('admin-edit');
    Route::post('/super-admin-dashboard/admin/edit/{id}', [UserController::class, 'update'])->name('admin-update');
    Route::delete('/super-admin-dashboard/admin/delete/{id}', [UserController::class, 'destroy'])->name('admin-delete');
    
    Route::get('/super-admin-dashboard/customer', [CustomerController::class, 'index'])->name('customer');
});


Route::middleware('admin')->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin');

    Route::get('/admin-dashboard/product/table', [ProductController::class, 'index'])->name('product-table');
    Route::get('/admin-dashboard/product/add', [ProductController::class, 'create'])->name('product-add');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
