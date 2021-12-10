<?php

namespace App\Services;

use App\Entities\Data\DataTable;
use App\Factories\RepositoryFactory;
use App\Relations\TableColumnRelations;
use App\Relations\TableRelations;
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
        TableRelations::setColumns($tables);
        $all_columns = collect($tables)->pluck('columns')->flatten()->toArray();
        TableColumnRelations::setDropdown($all_columns);
        return $tables;
    }
}
