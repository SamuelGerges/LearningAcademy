<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\SiteContent;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('front.inc.header',function ($view){
            $view->with('categories',Category::select('id','name')->get());
            $view->with('settings',Setting::select('logo','favicon')->first());
        });
        view()->composer('front.inc.footer',function ($view){
            $view->with('settings',Setting::first());
            $view->with('newsletter_content',SiteContent::select('content')
                ->where('name','Newsletter')->first());
            $view->with('e_train_content',SiteContent::select('content')
                ->where('name','E-Train')->first());
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
