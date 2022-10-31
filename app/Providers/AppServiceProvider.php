<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\User;

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
        //
        Paginator::useBootstrap();


        View::composer('back.*', function ($view) {

            // following code will create $posts variable which we can use
            // in our post.list view you can also create more variables if needed
            $view->with('data22', User::first());
        });
         //view()->share('ayarlar',User::first());
    }
}
