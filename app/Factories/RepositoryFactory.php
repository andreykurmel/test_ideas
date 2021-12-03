<?php

namespace App\Factories;

use App\Repositories\Data\DataTableItemRepository;
use App\Repositories\Data\DataTableRepository;

class RepositoryFactory
{
    /**
     * @return DataTableRepository
     */
    public static function dataTable(): DataTableRepository
    {
        return app(DataTableRepository::class);
    }

    /**
     * @return DataTableItemRepository
     */
    public static function dataTableItem(): DataTableItemRepository
    {
        return app(DataTableItemRepository::class);
    }
}
