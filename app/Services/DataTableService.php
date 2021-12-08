<?php

namespace App\Services;

use App\Entities\Data\DataTable;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Collection;

class DataTableService
{
    /**
     * @param array $ids
     * @return Collection<DataTable>|DataTable[]
     */
    public function dataTablesWithItems(array $ids = []): Collection
    {
        $tables = RepositoryFactory::dataTable()->get($ids);
        $columns = RepositoryFactory::dataTableItem()->getForTables( $tables->pluck('id') );
        foreach ($tables as $dto) {
            $dto->columns = $columns->where('table_id', '=', $dto->id)->values();
        }
        return $tables;
    }
}
