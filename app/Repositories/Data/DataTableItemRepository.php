<?php

namespace App\Repositories\Data;

use App\Entities\Collection;
use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;

interface DataTableItemRepository
{
    /**
     * @param array $table_ids
     * @return array
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

    /**
     * @param DataTableColumn[]|DataTableColumn $datas
     */
    public function relatedDropdown(array|DataTableColumn $datas): void;

    /**
     * @param Collection|DataTable $table
     * @return Collection
     */
    public function relatedToTable(Collection|DataTable $table): Collection;
}
