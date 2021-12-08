<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTableColumn;
use Illuminate\Support\Facades\Log;

class DataTableItemLogger extends DataTableItemBase
{
    /**
     * @inheritdoc
     */
    public function create(DataTableColumn $column): DataTableColumn
    {
        Log::info('column created');
        return parent::create($column);
    }

    /**
     * @inheritdoc
     */
    public function update(DataTableColumn $column): DataTableColumn
    {
        Log::info('column updated');
        return parent::update($column);
    }

}
