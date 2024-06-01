<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend as _;

Route::get('/', [_\HomeController::class, 'home'])->name('home');
Route::middleware(['guest'])->group(function() {
    Route::prefix('user')->name('user.')->group(function() {
        Route::post('/registration', [_\AuthController::class, 'registrationAction'])->name('registration');
        Route::post('/login', [_\AuthController::class, 'loginAction'])->name('login');
        Route::get('/account/{token}/verify', [_\AuthController::class, 'accountVerify'])->name('verify');
    });
});
Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [_\AuthController::class, 'logout'])->name('logout');
    Route::get('/my-reviews', [_\ReviewController::class, 'myReviews'])->name('my.reviews');
    Route::get('/load-more', [_\ReviewController::class, 'reviewLoadMore'])->name('reviews.load-more');
    Route::get('/my-profile', [_\UserConroller::class, 'myProfile'])->name('my.profile');
    Route::post('/update-profile', [_\UserConroller::class, 'update'])->name('update.profile');
    Route::post('/update-picture', [_\UserConroller::class, 'updateProfilePicture'])->name('update.picture');
    Route::post('/change-password', [_\UserConroller::class, 'changePassword'])->name('change.password');
});
Route::prefix('product')->name('product.')->group(function() {
    Route::get('/search', [_\ProductController::class, 'search'])->name('search');
    Route::get('/{product}', [_\ProductController::class, 'view'])->name('view');
    Route::post('/create', [_\ProductController::class, 'store'])->name('store');
});
Route::prefix('category')->name('category.')->group(function() {
    Route::get('/', [_\CategoryController::class, 'index'])->name('index');
    Route::post('/create', [_\CategoryController::class, 'store'])->name('store');
    Route::get('/{category}', [_\CategoryController::class, 'productList'])->name('productList');
});
Route::prefix('sub-category')->name('sub-category.')->group(function() {
    Route::get('/', [_\SubCategoryController::class, 'index'])->name('index');
    Route::post('/create', [_\SubCategoryController::class, 'store'])->name('store');
    Route::get('/{subCategory}', [_\SubCategoryController::class, 'productList'])->name('productList');
});
Route::prefix('brand')->name('brand.')->group(function() {
    Route::get('/', [_\BrandController::class, 'index'])->name('index');
    Route::post('/create', [_\BrandController::class, 'store'])->name('store');
    Route::get('/{brand}', [_\BrandController::class, 'productList'])->name('productList');
});
Route::prefix('product')->name('product.')->group(function() {
    Route::get('/search', [_\ProductController::class, 'search'])->name('search');
    Route::get('/{product}', [_\ProductController::class, 'view'])->name('view');
    Route::post('/create', [_\ProductController::class, 'store'])->name('store');
});
Route::prefix('recent-product')->name('recent-product.')->group(function() {
    Route::get('/load-more', [_\ProductController::class, 'recentProductLoadMore'])->name('load-more');
    Route::get('/filter', [_\ProductController::class, 'recentProductFilter'])->name('filter');
});
Route::prefix('review')->name('review.')->group(function() {
    Route::post('/create', [_\ReviewController::class, 'store'])->name('store');
});
Route::prefix('guest-review')->name('guest-review.')->group(function() {
    Route::post('/create', [_\GuestController::class, 'store'])->name('store');
});
Route::prefix('blog')->name('blog.')->group(function() {
    Route::get('/', [_\BlogController::class, 'index'])->name('index');
    Route::get('/{blog}', [_\BlogController::class, 'view'])->name('view');
});
Route::prefix('contact-us')->name('contact-us.')->group(function() {
    Route::get('/', [_\ContactUsController::class, 'index'])->name('index');
    Route::post('/send-msg', [_\ContactUsController::class, 'storeMsg'])->name('store-msg');


});
