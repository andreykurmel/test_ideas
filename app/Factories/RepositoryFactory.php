<?php

namespace App\Factories;

use App\Repositories\Data\DataTableItemRepository;
use App\Repositories\Data\DataTableRepository;
use App\Repositories\Dropdowns\DropdownRepository;

class RepositoryFactory
{
    /**
     * @return $this
     */
    public static function instance(): RepositoryFactory
    {
        return new static();
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
