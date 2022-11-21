<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Backend\AssignPermissionController;
use App\Http\Controllers\Backend\AssignRoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KategoriProdukController;
use App\Http\Controllers\Backend\ManajemenUsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProdukController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\DetailController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ROUTE FRONTEND
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('detail-produk/{slug}', [DetailController::class, 'index'])->name('detail.produk');

// ADD TO CART
Route::post('add-to-cart', [CartController::class, 'addProduk'])->name('addcart');

// CART COUNT
Route::get('load-cart-data', [CartController::class, 'cartcount'])->name('cartcount');

Route::middleware(['has.role'])->middleware('auth')->group(function () {
    // CART
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    // CHECKOUT
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    // UPDATE CART
    Route::put('update-cart', [CartController::class, 'updatedata'])->name('updatedata.cart');
    // TAMBAH QTY
    Route::put('tambah-qty', [CartController::class, 'tambahQty'])->name('tambahQty');
});

// SINGLE SIGN ON GOOGLE
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/google/update-password', [GoogleController::class, 'update_password_google'])->name('google.update-password');
Route::post('auth/google/update-password', [GoogleController::class, 'update_data_password_google'])->name('update_data_password_google');


Auth::routes();

Route::middleware(['has.role'])->middleware('auth')->group(function () {
    // DASHBOARD
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ROUTE KATEGORI PRODUK
    Route::get('kategori-produk',  [KategoriProdukController::class, 'index'])->name('kategori-produk.index');
    Route::post('kategori-produk',  [KategoriProdukController::class, 'store'])->name('kategori-produk.store');
    Route::get('kategori-produk/{id}/edit',  [KategoriProdukController::class, 'edit'])->name('kategori-produk.edit');
    Route::put('kategori-produk/{id}/update',  [KategoriProdukController::class, 'update'])->name('kategori-produk.update');
    Route::get('kategori-produk/destroy/{id}',  [KategoriProdukController::class, 'destroy'])->name('kategori-produk.destroy');

    // ROUTE PRODUK
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('produk/show/{id}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{id}/update',  [ProdukController::class, 'update'])->name('produk.update');
    Route::get('produk/{id}/delete-image', [ProdukController::class, 'deleteimage'])->name('images.delete');
    Route::get('produk/{id}/destroy',  [ProdukController::class, 'destroy'])->name('produk.destroy');

    // ROUTE ROLE
    Route::get('role',  [RoleController::class, 'index'])->name('role.index');
    Route::post('role',  [RoleController::class, 'store'])->name('role.store');
    Route::get('role/{role}/edit',  [RoleController::class, 'edit'])->name('role.edit');
    Route::put('role/{role}/update',  [RoleController::class, 'update'])->name('role.update');
    Route::get('role/destroy/{id}',  [RoleController::class, 'destroy'])->name('role.destroy');

    // ROUTE PERMISSION
    Route::get('permission',  [PermissionController::class, 'index'])->name('permission.index');
    Route::post('permission',  [PermissionController::class, 'store'])->name('permission.store');
    Route::get('permission/{permission}/edit',  [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('permission/{permission}/update',  [PermissionController::class, 'update'])->name('permission.update');
    Route::get('permission/destroy/{id}',  [PermissionController::class, 'destroy'])->name('permission.destroy');

    // ASSIGN PERMISSION TO ROLE
    Route::get('assignpermission', [AssignPermissionController::class, 'index'])->name('assignpermission.index');
    Route::post('assignpermission', [AssignPermissionController::class, 'store'])->name('assignpermission.store');
    Route::get('assignpermission/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assignpermission.edit');
    Route::put('assignpermission/{role}/update', [AssignPermissionController::class, 'update'])->name('assignpermission.update');

    // ASSIGN ROLE TO USER
    Route::get('assignrole', [AssignRoleController::class, 'index'])->name('assignrole.index');
    Route::post('assignrole', [AssignRoleController::class, 'store'])->name('assignrole.store');
    Route::get('assignrole/{user}/edit', [AssignRoleController::class, 'edit'])->name('assignrole.edit');
    Route::put('assignrole/{user}/update', [AssignRoleController::class, 'update'])->name('assignrole.update');

    // ROUTE MANAJEMEN USER
    Route::get('user', [ManajemenUsersController::class, 'index'])->name('user.index');
    Route::get('user/change-password/{id}/edit', [ManajemenUsersController::class, 'change_password'])->name('change-password');
    Route::put('user/change-password/{id}/edit', [ManajemenUsersController::class, 'update_password'])->name('update-password');
    Route::get('user/{id}/update', [ManajemenUsersController::class, 'status_akun'])->name('status-akun');
});
