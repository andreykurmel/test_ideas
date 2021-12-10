<?php

namespace App\Relations;

use App\Entities\Data\DataTableColumn;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Arr;

class TableColumnRelations
{
    /**
     * @param DataTableColumn[]|DataTableColumn $data_table_columns
     */
    public static function setDropdown(array|DataTableColumn $data_table_columns): void
    {
        $columns = is_array($data_table_columns) ? $data_table_columns : [$data_table_columns];

        $dropdowns = RepositoryFactory::dropdown()->get(Arr::pluck($columns, 'ddl_id'));
        $dropdowns = collect($dropdowns);

        foreach ($columns as $column) {
            $column->dropdown = $dropdowns->where('id', '=', $column->ddl_id)->first();
        }
    }
}
