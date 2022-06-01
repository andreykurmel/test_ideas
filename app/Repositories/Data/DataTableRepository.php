<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;

interface DataTableRepository
{
    /**
     * @param array $ids
     * @return array
     */
    public function get(array $ids = []): array;

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

    /**
     * @param array|DataTable $datas
     */
    public function relatedColumns(array|DataTable $datas): void;
}
