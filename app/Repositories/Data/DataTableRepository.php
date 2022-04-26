<?php

namespace App\Repositories\Data;

use App\Collections\Data\CollectionDataTable;
use App\Entities\Data\DataTable;

interface DataTableRepository
{
    /**
     * @param array $ids
     * @return CollectionDataTable
     */
    public function get(array $ids = []): CollectionDataTable;

    /**
     * @param int $id
     * @return DataTable
     */
    public function find(int $id): DataTable;

    /**
     * @param DataTable $dataTable
     * @return DataTable
     */
    public function create(DataTable $dataTable): DataTable;

    /**
     * @param DataTable $dataTable
     * @return DataTable
     */
    public function update(DataTable $dataTable): DataTable;
}
