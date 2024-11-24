<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PesananController as AdminPesananController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PesananController;
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

Route::middleware('superadmin')->group(function () {
    Route::get('/super-admin-dashboard', [SuperAdminDashboardController::class, 'index'])->name('super-admin');

    // Admin Account
    Route::get('/super-admin-dashboard/admin/table', [UserController::class, 'index'])->name('admin-table');
    Route::get('/super-admin-dashboard/admin/add', [UserController::class, 'create'])->name('admin-add');
    Route::post('/super-admin-dashboard/admin/add', [UserController::class, 'store'])->name('admin-store');
    Route::get('/super-admin-dashboard/admin/edit/{id}', [UserController::class, 'edit'])->name('admin-edit');
    Route::post('/super-admin-dashboard/admin/edit/{id}', [UserController::class, 'update'])->name('admin-update');
    Route::delete('/super-admin-dashboard/admin/delete/{id}', [UserController::class, 'destroy'])->name('admin-delete');
    
    // Customer Account
    Route::get('/super-admin-dashboard/customer', [CustomerController::class, 'index'])->name('customer');
});


Route::middleware('admin')->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin');

    // Product
    Route::get('/admin-dashboard/product/table', [ProductController::class, 'index'])->name('product-table');
    Route::get('/admin-dashboard/product/add', [ProductController::class, 'create'])->name('product-add');
    Route::post('/admin-dashboard/product/add', [ProductController::class, 'store'])->name('product-store');
    Route::get('/admin-dashboard/product/edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
    Route::post('/admin-dashboard/product/edit/{id}', [ProductController::class, 'update'])->name('product-update');
    Route::delete('/admin-dashboard/product/delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');
    
    // Category
    Route::get('/admin-dashboard/category/table', [CategoryController::class, 'index'])->name('category-table');
    Route::get('/admin-dashboard/category/add', [CategoryController::class, 'create'])->name('category-add');
    Route::post('/admin-dashboard/category/add', [CategoryController::class, 'store'])->name('category-store');
    Route::get('/admin-dashboard/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
    Route::post('/admin-dashboard/category/edit/{id}', [CategoryController::class, 'update'])->name('category-update');
    Route::delete('/admin-dashboard/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category-delete');

    // New Order
    Route::get('/admin-dashboard/new-order/table', [AdminPesananController::class, 'index'])->name('new-order-table');
});

// Home
Route::get('/', [MainController::class, 'index'])->name('home');

// Catalog
Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');

// Cart
Route::get('/cart', [KeranjangController::class, 'index'])->name('cart');
Route::get('/cart/{idProduk}', [KeranjangController::class, 'addToCart'])->name('cart-add');
Route::post('/cart/update', [KeranjangController::class, 'updateCart'])->name('cart-update');

// Checkout
Route::get('/checkout', [PesananController::class, 'index'])->name('checkout');
Route::post('/checkout/order', [PesananController::class, 'makeOrder'])->name('make-order');

// Order History
Route::get('/my-order', [MainController::class, 'myOrder'])->name('my-order');
Route::get('/my-order/{idProduk}', [KeranjangController::class, 'addToCart'])->name('cart-add-again');

// About Us
Route::get('/about-us', [MainController::class, 'about_us'])->name('about-us');

// Contacts
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');