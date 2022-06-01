<?php

namespace App\Factories;

use App\Repositories\Data\DataTableItemRepository;
use App\Repositories\Data\DataTableRepository;
use App\Repositories\Dropdowns\DropdownRepository;

final class RepositoryFactory
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

    /**
     * @return DropdownRepository
     */
    public static function dropdown(): DropdownRepository
    {
        return app(DropdownRepository::class);
    }
}
