<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use Illuminate\Support\Collection;

interface DataTableItemRepository
{

    /**
     * @return Collection|DataTableColumn[]
     */
    public function getForTables(iterable $table_ids): iterable;



    /**
     * @param DataTable $dataTable
     * @return DataTable[]
     */
    public function tableRelation(DataTable $dataTable): array;

    /**
     * @param Collection<DataTable>|DataTable[] $tables
     * @return Collection<DataTable>|DataTable[]
     */
    public function massTableRelationCount(Collection $tables): Collection;

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
