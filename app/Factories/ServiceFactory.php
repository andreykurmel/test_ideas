<?php

namespace App\Factories;

use App\Services\DataTableService;

class ServiceFactory
{
    /**
     * @return DataTableService
     */
    public static function dataTable(): DataTableService
    {
        return app(DataTableService::class);
    }
}
