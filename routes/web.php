<?php

// BACKEND
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Backend\AboutAndContactController;
use App\Http\Controllers\Backend\AssignPermissionController;
use App\Http\Controllers\Backend\AssignRoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OngkirController;
use App\Http\Controllers\Backend\KategoriProdukController;
use App\Http\Controllers\Backend\KebijakanPrivacy;
use App\Http\Controllers\Backend\ManajemenUsersController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\PesananController;
use App\Http\Controllers\Backend\ProdukController;
use App\Http\Controllers\Backend\PromosiController;
use App\Http\Controllers\Backend\RatingController as BackendRatingController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingWebsiteController;
use App\Http\Controllers\Backend\SlideController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//FRONTEND
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
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
Route::post('contact-store', [AboutController::class, 'contact_store'])->name('contact-store');
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
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('permission:Dashboard')->name('dashboard');
    
    // ROUTE KATEGORI PRODUK
    Route::get('kategori-produk',  [KategoriProdukController::class, 'index'])->middleware(['permission:Kategori Produk'])->name('kategori-produk.index');
    Route::post('kategori-produk',  [KategoriProdukController::class, 'store'])->middleware('permission:Kategori Store')->name('kategori-produk.store');
    Route::get('kategori-produk/{id}/edit',  [KategoriProdukController::class, 'edit'])->middleware('permission:Kategori Edit')->name('kategori-produk.edit');
    Route::put('kategori-produk/{id}/update',  [KategoriProdukController::class, 'update'])->middleware('permission:Kategori Update')->name('kategori-produk.update');
    Route::get('kategori-produk/destroy/{id}',  [KategoriProdukController::class, 'destroy'])->middleware('permission:Kategori Delete')->name('kategori-produk.destroy');
    
    // ROUTE PRODUK
    Route::get('produk', [ProdukController::class, 'index'])->middleware('permission:Semua Produk')->name('produk.index');
    Route::get('produk/create', [ProdukController::class, 'create'])->middleware('permission:Produk Create')->name('produk.create');
    Route::post('produk/store', [ProdukController::class, 'store'])->middleware('permission:Produk Store')->name('produk.store');
    Route::get('produk/show/{id}', [ProdukController::class, 'show'])->middleware('permission:Produk Show')->name('produk.show');
    Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->middleware('permission:Produk Edit')->name('produk.edit');
    Route::put('produk/{id}/update',  [ProdukController::class, 'update'])->middleware('permission:Produk Update')->name('produk.update');
    Route::get('produk/{id}/delete-image', [ProdukController::class, 'deleteimage'])->middleware('permission:Produk Delete Image')->name('images.delete');
    Route::get('produk/{id}/destroy',  [ProdukController::class, 'destroy'])->middleware('permission:Produk Delete')->name('produk.destroy');
    
    // ROUTE PESANAN
    Route::get('pesanan', [PesananController::class, 'index'])->middleware('permission:Manajemen Pesanan')->name('pesanan.index');
    Route::get('pesanan/packing', [PesananController::class, 'packing'])->middleware('permission:Pesanan Packing')->name('pesanan.packing');
    Route::get('pesanan/kirim', [PesananController::class, 'kirim'])->middleware('permission:Pesanan Kirim')->name('pesanan.kirim');
    Route::get('pesanan/success', [PesananController::class, 'success'])->middleware('permission:Pesanan Success')->name('pesanan.success');
    Route::get('pesanan/{id}/edit', [PesananController::class, 'edit'])->middleware('permission:Pesanan Edit')->name('pesanan.edit');
    Route::put('pesanan/{id}/update', [PesananController::class, 'update'])->middleware('permission:Pesanan Update')->name('pesanan.update');
    
    // ROUTE PAYMENT
    Route::get('payment', [PaymentController::class, 'index'])->middleware('permission:Metode Pembayaran')->name('payment.index');
    Route::post('payment/store', [PaymentController::class, 'store'])->middleware('permission:Pembayaran Store')->name('payment.store');
    Route::get('payment/{id}/edit', [PaymentController::class, 'edit'])->middleware('permission:Pembayaran Edit')->name('payment.edit');
    Route::put('payment/{id}/update', [PaymentController::class, 'update'])->middleware('permission:Pembayaran Update')->name('payment.update');
    Route::get('payment/destroy/{id}', [PaymentController::class, 'destroy'])->middleware('permission:Pembayaran Delete')->name('payment.destroy');
    
    // ROUTE ONGKIR
    Route::get('ongkir', [OngkirController::class, 'index'])->middleware('permission:Metode Ongkir')->name('ongkir.index');
    Route::post('ongkir/store', [OngkirController::class, 'store'])->middleware('permission:Ongkir Store')->name('ongkir.store');
    Route::get('ongkir/{id}/edit', [OngkirController::class, 'edit'])->middleware('permission:Ongkir Edit')->name('ongkir.edit');
    Route::put('ongkir/{id}/update', [OngkirController::class, 'update'])->middleware('permission:Ongkir Update')->name('ongkir.update');
    Route::get('ongkir/destroy/{id}', [OngkirController::class, 'destroy'])->middleware('permission:Ongkir Delete')->name('ongkir.destroy');
    
    // ROUTE SLIDER
    Route::get('slider', [SlideController::class, 'index'])->middleware('permission:Slide')->name('slider.index');
    Route::post('slider', [SlideController::class, 'store'])->middleware('permission:Slide Store')->name('slider.store');
    Route::get('slider/{id}/edit', [SlideController::class, 'edit'])->middleware('permission:Slide Edit')->name('slider.edit');
    Route::put('slider/{id}/update', [SlideController::class, 'update'])->middleware('permission:Slide Update')->name('slider.update');
    Route::get('slider/destroy/{id}', [SlideController::class, 'destroy'])->middleware('permission:Slide Delete')->name('slider.destroy');
    
    // ROUTE PROMOSI NAVBAR
    Route::get('promosi-navbar', [PromosiController::class, 'promosi_navbar'])->middleware('permission:Navbar Promosi')->name('promosi-navbar.index');
    Route::post('promosi-navbar', [PromosiController::class, 'promosi_navbar_store'])->middleware('permission:Navbar Promosi Store')->name('promosi-navbar.store');
    Route::get('promosi-navbar/{id}/edit', [PromosiController::class, 'promosi_navbar_edit'])->middleware('permission:Navbar Promosi Edit')->name('promosi-navbar.edit');
    Route::put('promosi-navbar/{id}/update', [PromosiController::class, 'promosi_navbar_update'])->middleware('permission:Navbar Promosi Update')->name('promosi-navbar.update');
    Route::get('promosi-navbar/destroy/{id}', [PromosiController::class, 'promosi_navbar_destroy'])->middleware('permission:Navbar Promosi Delete')->name('promosi-navbar.destroy');
    
    // ROUTE TIGA PROMOSI
    Route::get('tiga-promosi', [PromosiController::class, 'tiga_promosi'])->middleware('permission:Tiga Promosi')->name('tiga-promosi.index');
    Route::post('tiga-promosi', [PromosiController::class, 'tiga_promosi_store'])->middleware('permission:Tiga Promosi Store')->name('tiga-promosi.store');
    Route::get('tiga-promosi/{id}/edit', [PromosiController::class, 'tiga_promosi_edit'])->middleware('permission:Tiga Promosi Edit')->name('tiga-promosi.edit');
    Route::put('tiga-promosi/{id}/update', [PromosiController::class, 'tiga_promosi_update'])->middleware('permission:Tiga Promosi Update')->name('tiga-promosi.update');
    Route::get('tiga-promosi/destroy/{id}', [PromosiController::class, 'tiga_promosi_destroy'])->middleware('permission:Tiga Promosi Delete')->name('tiga-promosi.destroy');
    
    // ROUTE BANNER PROMOSI
    Route::get('banner-promosi', [PromosiController::class, 'banner_promosi'])->middleware('permission:Banner Promosi')->name('banner-promosi.index');
    Route::post('banner-promosi', [PromosiController::class, 'banner_promosi_store'])->middleware('permission:Banner Promosi Store')->name('banner-promosi.store');
    Route::put('banner-promosi/{id}/update', [PromosiController::class, 'banner_promosi_update'])->middleware('permission:Banner Promosi Update')->name('banner-promosi.update');
    
    // ROUTE PRIVACY POLICY
    Route::get('privacy-policy-admin', [KebijakanPrivacy::class, 'privacy_policy'])->middleware('permission:Privacy Policy')->name('privacy-policy-admin.index');
    Route::post('privacy-policy-admin', [KebijakanPrivacy::class, 'privacy_policy_store'])->middleware('permission:Privacy Policy Store')->name('privacy-policy-admin.store');
    Route::put('privacy-policy-admin/{id}/update', [KebijakanPrivacy::class, 'privacy_policy_update'])->middleware('permission:Privacy Policy Update')->name('privacy-policy-admin.update');
    
    // ROUTE TERMS CONDITIONS
    Route::get('terms-conditions-admin', [KebijakanPrivacy::class, 'terms_conditions'])->middleware('permission:Terms Conditions')->name('terms-conditions-admin.index');
    Route::post('terms-conditions-admin', [KebijakanPrivacy::class, 'terms_conditions_store'])->middleware('permission:Terms Conditions Store')->name('terms-conditions-admin.store');
    Route::put('terms-conditions-admin/{id}/update', [KebijakanPrivacy::class, 'terms_conditions_update'])->middleware('permission:Terms Conditions Update')->name('terms-conditions-admin.update');
    
    // ROUTE ABOUT COMPANY
    Route::get('about-company', [AboutAndContactController::class, 'about_company'])->middleware('permission:About Company')->name('about-company.index');
    Route::post('about-company', [AboutAndContactController::class, 'about_company_store'])->middleware('permission:About Company Store')->name('about-company.store');
    Route::put('about-company/{id}/update', [AboutAndContactController::class, 'about_company_update'])->middleware('permission:About Company Update')->name('about-company.update');
    
    // ROUTE CONTACT COMPANY
    Route::get('contact-company', [AboutAndContactController::class, 'contact_company'])->middleware('permission:Contact Masuk')->name('contact-company.index');
    Route::get('contact-company/{id}/show', [AboutAndContactController::class, 'contact_company_show'])->middleware('permission:Contact Masuk Show')->name('contact-company.show');
    Route::get('contact-company/destroy/{id}', [AboutAndContactController::class, 'contact_company_destroy'])->middleware('permission:Contact Masuk Delete')->name('contact-company.destroy');
    
    // ROUTE SETTING INFO WEBSITE
    Route::get('setting-info-website', [SettingWebsiteController::class, 'setting_info_website'])->middleware('permission:Setting Info Web')->name('setting-info-website.index');
    Route::post('setting-info-website', [SettingWebsiteController::class, 'setting_info_website_store'])->middleware('permission:Setting Info Web Store')->name('setting-info-website.store');
    Route::put('setting-info-website/{id}/update', [SettingWebsiteController::class, 'setting_info_website_update'])->middleware('permission:Setting Info Web Update')->name('setting-info-website.update');
    
    // ROUTE RATINGS
    Route::get('rating', [BackendRatingController::class, 'index'])->middleware('permission:Manajemen Rating')->name('rating.index');
    Route::get('rating/nonactive', [BackendRatingController::class, 'nonactive'])->middleware('permission:Manajemen Rating NonActive')->name('rating.nonactive');
    Route::get('rating/{id}/edit', [BackendRatingController::class, 'edit'])->middleware('permission:Manajemen Rating Edit')->name('rating.edit');
    Route::put('rating/{id}/update', [BackendRatingController::class, 'update'])->middleware('permission:Manajemen Rating Update')->name('rating.update');
    
    // ROUTE ROLE
    Route::get('role',  [RoleController::class, 'index'])->middleware('permission:Role')->name('role.index');
    Route::post('role',  [RoleController::class, 'store'])->middleware('permission:Role Store')->name('role.store');
    Route::get('role/{role}/edit',  [RoleController::class, 'edit'])->middleware('permission:Role Edit')->name('role.edit');
    Route::put('role/{role}/update',  [RoleController::class, 'update'])->middleware('permission:Role Update')->name('role.update');
    Route::get('role/destroy/{id}',  [RoleController::class, 'destroy'])->middleware('permission:Role Delete')->name('role.destroy');
    
    // ROUTE PERMISSION
    Route::get('permission',  [PermissionController::class, 'index'])->middleware('permission:Permission')->name('permission.index');
    Route::post('permission',  [PermissionController::class, 'store'])->middleware('permission:Permission Store')->name('permission.store');
    Route::get('permission/{permission}/edit',  [PermissionController::class, 'edit'])->middleware('permission:Permission Edit')->name('permission.edit');
    Route::put('permission/{permission}/update',  [PermissionController::class, 'update'])->middleware('permission:Permission Update')->name('permission.update');
    Route::get('permission/destroy/{id}',  [PermissionController::class, 'destroy'])->middleware('permission:Permission Delete')->name('permission.destroy');
    
    // ASSIGN PERMISSION TO ROLE
    Route::get('assignpermission', [AssignPermissionController::class, 'index'])->middleware('permission:Permission to Role')->name('assignpermission.index');
    Route::post('assignpermission', [AssignPermissionController::class, 'store'])->middleware('permission:Permission to Role Store')->name('assignpermission.store');
    Route::get('assignpermission/{role}/edit', [AssignPermissionController::class, 'edit'])->middleware('permission:Permission to Role Edit')->name('assignpermission.edit');
    Route::put('assignpermission/{role}/update', [AssignPermissionController::class, 'update'])->middleware('permission:Permission to Role Update')->name('assignpermission.update');
    
    // ASSIGN ROLE TO USER
    Route::get('assignrole', [AssignRoleController::class, 'index'])->middleware('permission:Role to User')->name('assignrole.index');
    Route::post('assignrole', [AssignRoleController::class, 'store'])->middleware('permission:Role to User Store')->name('assignrole.store');
    Route::get('assignrole/{user}/edit', [AssignRoleController::class, 'edit'])->middleware('permission:Role to User Edit')->name('assignrole.edit');
    Route::put('assignrole/{user}/update', [AssignRoleController::class, 'update'])->middleware('permission:Role to User Update')->name('assignrole.update');
    
    // ROUTE MANAJEMEN USER
    Route::get('user', [ManajemenUsersController::class, 'index'])->middleware('permission:Semua User')->name('user.index');
    Route::get('user/change-password/{id}/edit', [ManajemenUsersController::class, 'change_password'])->middleware('permission:Semua User Change Password')->name('change-password');
    Route::put('user/change-password/{id}/edit', [ManajemenUsersController::class, 'update_password'])->middleware('permission:Semua User Update Password')->name('update-password');
    Route::get('user/{id}/update', [ManajemenUsersController::class, 'status_akun'])->middleware('permission:Semua User Update Status')->name('status-akun');
});


Route::get('/website-up', function () {
    return Artisan::call('up');
});

Route::get('/website-down', function () {
    return Artisan::call("down --secret=putrateguh");
});
