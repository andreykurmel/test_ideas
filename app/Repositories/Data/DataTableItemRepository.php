<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use Illuminate\Support\Collection;

interface DataTableItemRepository
{
    /**
     * @param int[] $table_ids
     * @return DataTableColumn[]
     */
    public function getbyTableId(array $table_ids): array;

    /**
     * @param DataTableColumn $column
     * @return DataTableColumn
     */
    public function create(DataTableColumn $column): DataTableColumn;

    /**
     * @param DataTableColumn $column
     * @return DataTableColumn
     */
    public function update(DataTableColumn $column): DataTableColumn;
}
