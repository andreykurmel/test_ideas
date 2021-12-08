<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class DataTableCacher extends DataTableLogger
{
    /**
     * @inheritdoc
     */
    public function getById(int $id): DataTable
    {
        return Cache::rememberForever('data_table_'.$id, function () use ($id) {
            return parent::getById($id);
        });
    }

    /**
     * @inheritdoc
     */
    public function allTables(): Collection
    {
        return Cache::rememberForever('data_tables_all', function () {
            return parent::allTables();
        });
    }

    /**
     * @inheritdoc
     */
    public function create(DataTable $dataTable): DataTable
    {
        Cache::forget('data_tables_all');
        return parent::create($dataTable);
    }

    /**
     * @inheritdoc
     */
    public function update(DataTable $dataTable): DataTable
    {
        Cache::forget('data_tables_all');
        Cache::forget('data_table_'.$dataTable->id);
        return parent::update($dataTable);
    }

}
