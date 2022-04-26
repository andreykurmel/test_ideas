<?php

namespace App\Factories;

use App\Repositories\Data\DataTableItemRepository;
use App\Repositories\Data\DataTableRepository;
use App\Repositories\Dropdowns\DropdownRepository;

final class RepositoryFactory
{
    /**
     * @return RepositoryFactory
     */
    public static function instance(): RepositoryFactory
    {
        return new RepositoryFactory();
    }

    /**
     * @return DataTableRepository
     */
    public function dataTable(): DataTableRepository
    {
        return app(DataTableRepository::class);
    }

    /**
     * @return DataTableItemRepository
     */
    public function dataTableItem(): DataTableItemRepository
    {
        return app(DataTableItemRepository::class);
    }

    /**
     * @return DropdownRepository
     */
    public function dropdown(): DropdownRepository
    {
        return app(DropdownRepository::class);
    }
}
