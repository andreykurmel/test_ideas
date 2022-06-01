<?php

namespace App\Services;

use App\Entities\Data\DataTable;
use App\Factories\RelationFactory;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class DataTableService
{
    /**
     * @param array $ids
     * @return DataTable[]
     */
    public function dataTablesWithItemsAndDropdowns(array $ids = []): array
    {
        $tables = RepositoryFactory::dataTable()->get($ids);
        RepositoryFactory::dataTable()->relatedColumns($tables);
        $columns = collect($tables)->pluck('columns')->flatten()->toArray();
        RepositoryFactory::dataTableItem()->relatedDropdown($columns);
        return $tables;
    }
}
