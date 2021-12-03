<?php

namespace App\Providers;

use App\Repositories\Data\DataTableBase;
use App\Repositories\Data\DataTableItemBase;
use App\Repositories\Data\DataTableItemRepository;
use App\Repositories\Data\DataTableRepository;
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
        $this->app->singleton(DataTableRepository::class, DataTableBase::class);
        $this->app->singleton(DataTableItemRepository::class, DataTableItemBase::class);
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
