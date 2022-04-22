<?php

namespace App\Factories;

use App\Services\DataTableService;

class ServiceFactory
{
    /**
     * @return $this
     */
    public static function instance(): ServiceFactory
    {
        return new static();
    }

    /**
     * @return DataTableService
     */
    public function dataTable(): DataTableService
    {
        return app(DataTableService::class);
    }
}
