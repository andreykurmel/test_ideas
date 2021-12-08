<?php

namespace App\Providers;

use App\Repositories\Data\DataTableBase;
use App\Repositories\Data\DataTableCacher;
use App\Repositories\Data\DataTableItemBase;
use App\Repositories\Data\DataTableItemCacher;
use App\Repositories\Data\DataTableItemLogger;
use App\Repositories\Data\DataTableItemRepository;
use App\Repositories\Data\DataTableLogger;
use App\Repositories\Data\DataTableRepository;
use App\Repositories\Dropdowns\DropdownBase;
use App\Repositories\Dropdowns\DropdownCacher;
use App\Repositories\Dropdowns\DropdownLogger;
use App\Repositories\Dropdowns\DropdownRepository;
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
        $this->app->singleton(DataTableRepository::class, DataTableCacher::class);
        $this->app->singleton(DataTableItemRepository::class, DataTableItemCacher::class);
        $this->app->singleton(DropdownRepository::class, DropdownCacher::class);
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
