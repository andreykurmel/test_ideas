<?php

namespace App\Providers;

use App\Repositories\Data\DataTableBase;
use App\Repositories\Data\DataTableCacher;
use App\Repositories\Data\DataTableItemBase;
use App\Repositories\Data\DataTableItemRepository;
use App\Repositories\Data\DataTableLogger;
use App\Repositories\Data\DataTableRepository;
use App\Repositories\Dropdowns\DropdownBase;
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
        //Order of functions: 'Caching' -> 'Logging' -> 'Base'
        $this->app->when(DataTableCacher::class)
            ->needs(DataTableRepository::class)
            ->give(DataTableLogger::class);

        $this->app->when(DataTableLogger::class)
            ->needs(DataTableRepository::class)
            ->give(DataTableBase::class);

        //Singletones
        $this->app->singleton(DataTableRepository::class, DataTableBase::class);
        $this->app->singleton(DataTableItemRepository::class, DataTableItemBase::class);
        $this->app->singleton(DropdownRepository::class, DropdownBase::class);
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
