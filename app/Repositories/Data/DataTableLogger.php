<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use Illuminate\Support\Facades\Log;

class DataTableLogger extends DataTableBase
{
    /**
     * @inheritdoc
     */
    public function create(DataTable $dataTable): DataTable
    {
        Log::info('table created');
        return parent::create($dataTable);
    }

    /**
     * @inheritdoc
     */
    public function update(DataTable $dataTable): DataTable
    {
        Log::info('table update');
        return parent::update($dataTable);
    }

}
