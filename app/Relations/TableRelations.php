<?php

namespace App\Relations;

use App\Entities\Data\DataTable;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Arr;

class TableRelations
{
    /**
     * @param DataTable[]|DataTable $data_tables
     */
    public static function setColumns(array|DataTable $data_tables): void
    {
        $tables = is_array($data_tables) ? $data_tables : [$data_tables];

        $columns = RepositoryFactory::dataTableItem()->getbyTableId(Arr::pluck($tables, 'id'));
        $columns = collect($columns);

        foreach ($tables as $table) {
            $table->columns = $columns->where('table_id', '=', $table->id)->toArray();
        }
    }
}
