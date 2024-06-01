<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('pages.frontend.landing_page_items.recent_product', function ($view) {
            $products = \App\Http\Controllers\Frontend\ProductController::recentProduct();
            $view->with('products', $products);
        });
        View::composer('pages.frontend.landing_page_items.main_slider', function ($view) {
            $currentDateTime = date('Y-m-d H:i:s');
            $sliders = \App\Models\Slider::orderBy("id", "desc")
                ->where('start_date', '<=', $currentDateTime)
                ->where('end_date', '>=', $currentDateTime)
                ->get();
            $view->with('sliders', $sliders);
        });
        View::composer([
            'pages.frontend.landing_page_items.recent_product',
            'include.frontend.home-wd-header',
            'include.frontend.home-wd-header-2',
        ], function ($view) {
            $categories = \App\Models\Category::with('sub_categories.brands.products')
                ->limit(10)
                ->get();
            $view->with('categories', $categories);
        });
        View::composer('pages.frontend.landing_page_items.top_blogs', function ($view) {
            $blogs = \App\Models\Blog::orderBy("created_at", "desc")
                ->where('status','=', 'publish')
                ->take(4)
                ->get();
            $view->with('blogs', $blogs);
        });
        View::composer('pages.frontend.landing_page_items.top_rated_product', function ($view) {
            $productsIndexed = \App\Http\Controllers\Frontend\ProductController::topRatedProducts();
            $view->with('productsIndexed', $productsIndexed);
        });
        View::composer('*', function ($view) {
            $settings =  \App\Models\GeneralSetting::first();

            if (!empty($settings)) {
                $settings = json_decode($settings->settings_data);
            } else {
                $settings = (object) [];
            }
            $view->with('settings', $settings);
        });
    }
}
