<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Compound;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'material' => Material::class,
            'compound' => Compound::class,
            'brand' => Brand::class,
        ]);
    }
}
