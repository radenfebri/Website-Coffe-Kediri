<?php

// BACKEND
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Backend\AssignPermissionController;
use App\Http\Controllers\Backend\AssignRoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KategoriProdukController;
use App\Http\Controllers\Backend\ManajemenUsersController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\PesananController;
use App\Http\Controllers\Backend\ProdukController;
use App\Http\Controllers\Backend\PromosiController;
use App\Http\Controllers\Backend\RatingController as BackendRatingController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SlideController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//FRONTEND
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\KategoriController;
use App\Http\Controllers\Frontend\SettingController;
use App\Http\Controllers\Frontend\DetailController;
use App\Http\Controllers\Frontend\PembayaranController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ChangePasswordController;
use App\Http\Controllers\Frontend\FavoritController;
use App\Http\Controllers\Frontend\OrderHistoryController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Frontend\TermsConditionsController;
use App\Http\Controllers\Frontend\RatingController;
use Illuminate\Support\Facades\Artisan;

// ROUTE FRONTEND
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('kategori/{slug}', [KategoriController::class, 'index'])->name('kategori');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
Route::get('terms-conditions', [TermsConditionsController::class, 'index'])->name('terms-condition');
Route::get('detail-produk/{slug}', [DetailController::class, 'index'])->name('detail.produk');

// ADD TO CART
Route::post('add-to-cart', [CartController::class, 'addProduk'])->name('addcart');

// REMOVE CART LIST
Route::post('delete-cart-item', [CartController::class, 'deleteproduk'])->name('deletecart');

// CART COUNT
Route::get('load-cart-data', [CartController::class, 'cartcount'])->name('cartcount');

// UPDATE CART
Route::post('update-cart', [CartController::class, 'updatecart']);

// ADD TO FAVORIT
Route::post('add-to-wishlist', [FavoritController::class, 'addFavorit'])->name('addfavorit');

// CART FAVORIT
Route::get('load-wishlist-data', [FavoritController::class, 'favoritcount'])->name('favoritcount');

// REMOVE FAVORIT LIST
Route::post('delete-favorit-item', [FavoritController::class, 'deleteproduk'])->name('deletefavorit');

// SEARCH PRODUK HEADER 
Route::get('produk-list', [HomeController::class, 'search'])->name('search');
Route::post('searchproduk', [HomeController::class, 'searchproduk'])->name('searchproduk');

Route::middleware(['has.role'])->middleware('auth', 'verified')->group(function () {
    // CART
    Route::get('cart', [CartController::class, 'index'])->name('cart');

    // ROUTE FAVORIT LIST
    Route::get('favorit', [FavoritController::class, 'favoritview'])->name('favorit.view');

    // CHECKOUT
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');

    // ROUTE PLACE ORDER
    Route::post('place-order', [CheckoutController::class, 'placeorder'])->name('placeorder');

    // CHANGE PASSWORD
    Route::get('change-password', [ChangePasswordController::class, 'index'])->name('changePassword');
    Route::post('update-password', [ChangePasswordController::class, 'updatepassword'])->name('updatepassword');

    // SETTING DATA
    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::post('update-data', [SettingController::class, 'updatedata'])->name('updatedata');

    // ORDER HISTORY
    Route::get('order-history', [OrderHistoryController::class, 'index'])->name('orderHistory');

    // ROUTE ADD RATING
    Route::post('add-rating', [RatingController::class, 'addrating'])->name('rating');

    // PEMBAYARAN
    Route::get('pembayaran/{id}', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('packing/{id}', [PembayaranController::class, 'packing'])->name('packing');
    Route::get('kirim/{id}', [PembayaranController::class, 'kirim'])->name('kirim');
    Route::get('selesai/{id}', [PembayaranController::class, 'selesai'])->name('selesai');
});

// SINGLE SIGN ON GOOGLE
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/google/update-password', [GoogleController::class, 'update_password_google'])->name('google.update-password');
Route::post('auth/google/update-password', [GoogleController::class, 'update_data_password_google'])->name('update_data_password_google');


Auth::routes(['verify' => true]);

Route::middleware(['has.role'])->middleware('auth', 'verified')->group(function () {
    // DASHBOARD
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('permission:halaman-dashboard')->name('dashboard');

    // ROUTE KATEGORI PRODUK
    Route::get('kategori-produk',  [KategoriProdukController::class, 'index'])->middleware('permission:halaman-kategori')->name('kategori-produk.index');
    Route::post('kategori-produk',  [KategoriProdukController::class, 'store'])->middleware('permission:kategori-create')->name('kategori-produk.store');
    Route::get('kategori-produk/{id}/edit',  [KategoriProdukController::class, 'edit'])->middleware('permission:kategori-edit')->name('kategori-produk.edit');
    Route::put('kategori-produk/{id}/update',  [KategoriProdukController::class, 'update'])->name('kategori-produk.update');
    Route::get('kategori-produk/destroy/{id}',  [KategoriProdukController::class, 'destroy'])->middleware('permission:kategori-delete')->name('kategori-produk.destroy');

    // ROUTE PRODUK
    Route::get('produk', [ProdukController::class, 'index'])->middleware('permission:halaman-produk')->name('produk.index');
    Route::get('produk/create', [ProdukController::class, 'create'])->middleware('permission:produk-create')->name('produk.create');
    Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('produk/show/{id}', [ProdukController::class, 'show'])->middleware('permission:produk-show')->name('produk.show');
    Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->middleware('permission:produk-edit')->name('produk.edit');
    Route::put('produk/{id}/update',  [ProdukController::class, 'update'])->name('produk.update');
    Route::get('produk/{id}/delete-image', [ProdukController::class, 'deleteimage'])->name('images.delete');
    Route::get('produk/{id}/destroy',  [ProdukController::class, 'destroy'])->middleware('permission:produk-delete')->name('produk.destroy');

    // ROUTE PESANAN
    Route::get('pesanan', [PesananController::class, 'index'])->middleware('permission:halaman-pesanan')->name('pesanan.index');
    Route::get('pesanan/packing', [PesananController::class, 'packing'])->middleware('permission:pesanan-packing')->name('pesanan.packing');
    Route::get('pesanan/kirim', [PesananController::class, 'kirim'])->middleware('permission:pesanan-kirim')->name('pesanan.kirim');
    Route::get('pesanan/success', [PesananController::class, 'success'])->middleware('permission:pesanan-success')->name('pesanan.success');
    Route::get('pesanan/{id}/edit', [PesananController::class, 'edit'])->middleware('permission:pesanan-edit')->name('pesanan.edit');
    Route::put('pesanan/{id}/update', [PesananController::class, 'update'])->name('pesanan.update');

    // ROUTE PAYMENT
    Route::get('payment', [PaymentController::class, 'index'])->middleware('permission:halaman-payment')->name('payment.index');
    Route::post('payment/store', [PaymentController::class, 'store'])->middleware('permission:payment-create')->name('payment.store');
    Route::get('payment/{id}/edit', [PaymentController::class, 'edit'])->middleware('permission:payment-edit')->name('payment.edit');
    Route::put('payment/{id}/update', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('payment/destroy/{id}', [PaymentController::class, 'destroy'])->middleware('permission:payment-delete')->name('payment.destroy');

    // ROUTE SLIDER
    Route::get('slider', [SlideController::class, 'index'])->name('slider.index');
    Route::post('slider', [SlideController::class, 'store'])->name('slider.store');
    Route::get('slider/{id}/edit', [SlideController::class, 'edit'])->name('slider.edit');
    Route::put('slider/{id}/update', [SlideController::class, 'update'])->name('slider.update');
    Route::get('slider/destroy/{id}', [SlideController::class, 'destroy'])->name('slider.destroy');

    // ROUTE PROMOSI NAVBAR
    Route::get('promosi-navbar', [PromosiController::class, 'promosi_navbar'])->name('promosi-navbar.index');
    Route::post('promosi-navbar', [PromosiController::class, 'promosi_navbar_store'])->name('promosi-navbar.store');
    Route::get('promosi-navbar/{id}/edit', [PromosiController::class, 'promosi_navbar_edit'])->name('promosi-navbar.edit');
    Route::put('promosi-navbar/{id}/update', [PromosiController::class, 'promosi_navbar_update'])->name('promosi-navbar.update');
    Route::get('promosi-navbar/destroy/{id}', [PromosiController::class, 'promosi_navbar_destroy'])->name('promosi-navbar.destroy');

    // ROUTE TIGA PROMOSI
    Route::get('tiga-promosi', [PromosiController::class, 'tiga_promosi'])->name('tiga-promosi.index');
    Route::post('tiga-promosi', [PromosiController::class, 'tiga_promosi_store'])->name('tiga-promosi.store');
    Route::get('tiga-promosi/{id}/edit', [PromosiController::class, 'tiga_promosi_edit'])->name('tiga-promosi.edit');
    Route::put('tiga-promosi/{id}/update', [PromosiController::class, 'tiga_promosi_update'])->name('tiga-promosi.update');
    Route::get('tiga-promosi/destroy/{id}', [PromosiController::class, 'tiga_promosi_destroy'])->name('tiga-promosi.destroy');

    // ROUTE BANNER PROMOSI
    Route::get('banner-promosi', [PromosiController::class, 'banner_promosi'])->name('banner-promosi.index');
    Route::post('banner-promosi', [PromosiController::class, 'banner_promosi_store'])->name('banner-promosi.store');
    Route::put('banner-promosi/{id}/update', [PromosiController::class, 'banner_promosi_update'])->name('banner-promosi.update');

    // ROUTE RATINGS
    Route::get('rating', [BackendRatingController::class, 'index'])->middleware('permission:halaman-rating')->name('rating.index');
    Route::get('rating/nonactive', [BackendRatingController::class, 'nonactive'])->middleware('permission:rating-nonactive')->name('rating.nonactive');
    Route::get('rating/{id}/edit', [BackendRatingController::class, 'edit'])->middleware('permission:rating-edit')->name('rating.edit');
    Route::put('rating/{id}/update', [BackendRatingController::class, 'update'])->name('rating.update');

    // ROUTE ROLE
    Route::get('role',  [RoleController::class, 'index'])->middleware('permission:halaman-role')->name('role.index');
    Route::post('role',  [RoleController::class, 'store'])->middleware('permission:role-create')->name('role.store');
    Route::get('role/{role}/edit',  [RoleController::class, 'edit'])->middleware('permission:role-edit')->name('role.edit');
    Route::put('role/{role}/update',  [RoleController::class, 'update'])->name('role.update');
    Route::get('role/destroy/{id}',  [RoleController::class, 'destroy'])->middleware('permission:role-delete')->name('role.destroy');

    // ROUTE PERMISSION
    Route::get('permission',  [PermissionController::class, 'index'])->middleware('permission:halaman-permission')->name('permission.index');
    Route::post('permission',  [PermissionController::class, 'store'])->middleware('permission:permission-create')->name('permission.store');
    Route::get('permission/{permission}/edit',  [PermissionController::class, 'edit'])->middleware('permission:permission-edit')->name('permission.edit');
    Route::put('permission/{permission}/update',  [PermissionController::class, 'update'])->name('permission.update');
    Route::get('permission/destroy/{id}',  [PermissionController::class, 'destroy'])->middleware('permission:permission-delete')->name('permission.destroy');

    // ASSIGN PERMISSION TO ROLE
    Route::get('assignpermission', [AssignPermissionController::class, 'index'])->middleware('permission:halaman-assignpermission')->name('assignpermission.index');
    Route::post('assignpermission', [AssignPermissionController::class, 'store'])->middleware('permission:assignpermission-create')->name('assignpermission.store');
    Route::get('assignpermission/{role}/edit', [AssignPermissionController::class, 'edit'])->middleware('permission:assignpermission-edit')->name('assignpermission.edit');
    Route::put('assignpermission/{role}/update', [AssignPermissionController::class, 'update'])->name('assignpermission.update');

    // ASSIGN ROLE TO USER
    Route::get('assignrole', [AssignRoleController::class, 'index'])->middleware('permission:halaman-assignrole')->name('assignrole.index');
    Route::post('assignrole', [AssignRoleController::class, 'store'])->middleware('permission:assignrole-create')->name('assignrole.store');
    Route::get('assignrole/{user}/edit', [AssignRoleController::class, 'edit'])->middleware('permission:assignrole-edit')->name('assignrole.edit');
    Route::put('assignrole/{user}/update', [AssignRoleController::class, 'update'])->name('assignrole.update');

    // ROUTE MANAJEMEN USER
    Route::get('user', [ManajemenUsersController::class, 'index'])->middleware('permission:halaman-user')->name('user.index');
    Route::get('user/change-password/{id}/edit', [ManajemenUsersController::class, 'change_password'])->middleware('permission:user-edit-password')->name('change-password');
    Route::put('user/change-password/{id}/edit', [ManajemenUsersController::class, 'update_password'])->name('update-password');
    Route::get('user/{id}/update', [ManajemenUsersController::class, 'status_akun'])->middleware('permission:user-edit-status')->name('status-akun');
});


Route::get('/website-up', function () {
    return Artisan::call('up');
});

Route::get('/website-down', function () {
    return Artisan::call("down --secret=putrateguh");
});
