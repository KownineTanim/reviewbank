<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as _;

// Route::get('/signin', [_\AuthController::class, 'login'])->name('login');
// Route::post('/signin', [_\AuthController::class, 'loginAction']);

Route::middleware(['auth', 'auth.permission', 'auth.dashboard'])->group(function(){
    Route::get('/logout', [_\AuthController::class, 'logout'])->name('logout');
    Route::get('/', [_\DashboardController::class, 'index'])->name('home');

    Route::prefix('role')->name('role.')->group(function(){
        Route::get('/', [_\RoleController::class, 'index'])->name('index');
        Route::get('/create', [_\RoleController::class, 'create'])->name('create');
        Route::post('/create', [_\RoleController::class, 'store']);
        Route::get('/{role}/edit', [_\RoleController::class, 'edit'])->name('edit');
        Route::post('/{role}/edit', [_\RoleController::class, 'update']);
    });
    Route::prefix('landing-page-item')->name('landing-page-item.')->group(function(){
        Route::get('/', [_\LandingPageController::class, 'index'])->name('index');
        Route::get('/create', [_\LandingPageController::class, 'create'])->name('create');
        Route::post('/create', [_\LandingPageController::class, 'store']);
        Route::post('/sort', [_\LandingPageController::class, 'sort'])->name('sort');
        Route::delete('/{item}/destroy', [_\LandingPageController::class, 'landingPageItemDestroy'])->name('destroy');
    });
    Route::prefix('slider')->name('slider.')->group(function(){
        Route::get('/', [_\SliderController::class, 'index'])->name('index');
        Route::get('/create', [_\SliderController::class, 'create'])->name('create');
        Route::post('/create', [_\SliderController::class, 'store']);
        Route::get('/{slider}/edit', [_\SliderController::class, 'edit'])->name('edit');
        Route::post('/{slider}/edit', [_\SliderController::class, 'update']);
    });
    Route::prefix('ads')->name('ads.')->group(function(){
        Route::get('/', [_\AdsController::class, 'index'])->name('index');
        Route::get('/create', [_\AdsController::class, 'create'])->name('create');
        Route::get('/{template}/load-form', [_\AdsController::class, 'loadForm'])->name('loadForm');
        Route::post('/create', [_\AdsController::class, 'store']);
        Route::get('/{ad}/edit', [_\AdsController::class, 'edit'])->name('edit');
        Route::post('/{ad}/edit', [_\AdsController::class, 'update']);
    });
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/', [_\CategoryController::class, 'index'])->name('index');
        Route::get('/create', [_\CategoryController::class, 'create'])->name('create');
        Route::post('/create', [_\CategoryController::class, 'store']);
        Route::get('/{category}/edit', [_\CategoryController::class, 'edit'])->name('edit');
        Route::post('/{category}/edit', [_\CategoryController::class, 'update']);
        Route::get('/pending', [_\CategoryController::class, 'pendingCategory'])->name('pending');
        Route::post('/approved', [_\CategoryController::class, 'approved'])->name('approved');
    });
    Route::prefix('sub-category')->name('sub-category.')->group(function(){
        Route::get('/', [_\SubCategoryController::class, 'index'])->name('index');
        Route::get('/create', [_\SubCategoryController::class, 'create'])->name('create');
        Route::post('/create', [_\SubCategoryController::class, 'store']);
        Route::get('/{subCategory}/edit', [_\SubCategoryController::class, 'edit'])->name('edit');
        Route::post('/{subCategory}/edit', [_\SubCategoryController::class, 'update']);
        Route::get('/pending', [_\SubCategoryController::class, 'pendingSubCategory'])->name('pending');
        Route::post('/approved', [_\SubCategoryController::class, 'approved'])->name('approved');
    });
    Route::prefix('brand')->name('brand.')->group(function(){
        Route::get('/', [_\BrandController::class, 'index'])->name('index');
        Route::get('/create', [_\BrandController::class, 'create'])->name('create');
        Route::post('/create', [_\BrandController::class, 'store']);
        Route::get('/{brand}/edit', [_\BrandController::class, 'edit'])->name('edit');
        Route::post('/{brand}/edit', [_\BrandController::class, 'update']);
        Route::get('/pending', [_\BrandController::class, 'pendingBrand'])->name('pending');
        Route::post('/approved', [_\BrandController::class, 'approved'])->name('approved');
    });
    Route::prefix('product')->name('product.')->group(function(){
        Route::get('/', [_\ProductController::class, 'index'])->name('index');
        Route::get('/create', [_\ProductController::class, 'create'])->name('create');
        Route::post('/create', [_\ProductController::class, 'store']);
        Route::get('/{product}/edit', [_\ProductController::class, 'edit'])->name('edit');
        Route::post('/{product}/edit', [_\ProductController::class, 'update']);
        Route::post('/images/{product}/store', [_\ProductController::class, 'otherImageStore'])->name('otherImage.store');
        Route::delete('/images/{otherImage}/destroy', [_\ProductController::class, 'otherImageDestroy'])->name('otherImage.destroy');
        Route::get('/pending', [_\ProductController::class, 'pendingProduct'])->name('pending');
        Route::post('/approved', [_\ProductController::class, 'approved'])->name('approved');
    });
    Route::prefix('review')->name('review.')->group(function(){
        Route::get('/', [_\ReviewController::class, 'index'])->name('index');
        Route::get('/create', [_\ReviewController::class, 'create'])->name('create');
        Route::post('/create', [_\ReviewController::class, 'store']);
        Route::get('/{id}/product', [_\ReviewController::class, 'productWiseReview'])->name('productWiseReview');
        Route::get('/{id}/single', [_\ReviewController::class, 'singleReview'])->name('singleReview');
        Route::get('/{review}/edit', [_\ReviewController::class, 'edit'])->name('edit');
        Route::post('/{review}/edit', [_\ReviewController::class, 'update']);
        Route::get('/pending', [_\ReviewController::class, 'pendingReview'])->name('pending');
        Route::post('/approved', [_\ReviewController::class, 'approved'])->name('approved');
    });
    Route::prefix('blog')->name('blog.')->group(function(){
        Route::get('/', [_\BlogController::class, 'index'])->name('index');
        Route::get('/create', [_\BlogController::class, 'create'])->name('create');
        Route::post('/create', [_\BlogController::class, 'store']);
        Route::get('/{blog}/edit', [_\BlogController::class, 'edit'])->name('edit');
        Route::post('/{blog}/edit', [_\BlogController::class, 'update']);
        Route::get('/{id}/single', [_\BlogController::class, 'view'])->name('view');
    });
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/', [_\UserController::class, 'index'])->name('index');
        Route::get('/create', [_\UserController::class, 'create'])->name('create');
        Route::post('/create', [_\UserController::class, 'store']);
        Route::get('/{user}/edit', [_\UserController::class, 'edit'])->name('edit');
        Route::post('/{user}/edit', [_\UserController::class, 'update']);
    });
    Route::prefix('contact-us')->name('contact-us.')->group(function(){
        Route::get('/create', [_\ContactUsController::class, 'create'])->name('create');
        Route::post('/create', [_\ContactUsController::class, 'store']);
        Route::get('/message', [_\ContactUsController::class, 'messageList'])->name('messageList');
        Route::delete('/{contactMessage}/destroy', [_\ContactUsController::class, 'contactMessageDestroy'])->name('destroy');
    });
    Route::prefix('general-settings')->name('general-settings.')->group(function(){
        Route::get('/create', [_\GeneralSettingController::class, 'create'])->name('create');
        Route::post('/create', [_\GeneralSettingController::class, 'store']);
    });
});
