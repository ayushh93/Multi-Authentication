<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ContactDetail;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(['admin.*', 'auth.*', 'frontend.*'], function ($view) {
            $view->with('site', SiteSetting::first());
            $view->with('contactdetail', ContactDetail::first());
        });

        View::composer(['frontend.layouts.includes.footer'], function ($view) {
            $view->with('footerexpeditions', Category::where('id', 2)->first());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
