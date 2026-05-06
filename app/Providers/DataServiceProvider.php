<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PostCategory;
use App\Models\Bidang;
use App\Models\Jurusan;
use App\Models\ProductCategory;

class DataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('navbarpostcategories', function () {
            return PostCategory::all();
        });

        $this->app->singleton('navbarbidang', function () {
            return Bidang::all();
        });

        $this->app->singleton('navbarjurusan', function () {
            return Jurusan::all();
        });

        $this->app->singleton('navbarproductcategories', function () {
            return ProductCategory::all();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
