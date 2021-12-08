<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use Illuminate\Support\Facades\Cache;

class DataTableItemCacher extends DataTableItemLogger
{

    /**
     * @inheritdoc
     */
    public function create(DataTableColumn $column): DataTableColumn
    {
        Cache::forget('data_table_'.$column->table_id);
        Cache::forget('data_tables_all');
        return parent::create($column);
    }

    /**
     * @inheritdoc
     */
    public function update(DataTableColumn $column): DataTableColumn
    {
        Cache::forget('data_table_'.$column->table_id);
        Cache::forget('data_tables_all');
        return parent::update($column);
    }

}
