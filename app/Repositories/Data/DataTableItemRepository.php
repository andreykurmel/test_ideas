<?php

namespace App\Repositories\Data;

use App\Collections\Data\CollectionDataTable;
use App\Collections\Data\CollectionDataTableColumn;
use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use Illuminate\Support\Collection;

interface DataTableItemRepository
{
    /**
     * @param array $table_ids
     * @return CollectionDataTableColumn
     */
    public function getbyTableId(array $table_ids): CollectionDataTableColumn;

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

    /**
     * @param CollectionDataTable $collection
     * @return CollectionDataTable
     */
    public function relationColumns(CollectionDataTable $collection): CollectionDataTable;
}
