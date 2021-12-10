<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;

interface DataTableRepository
{
    /**
     * @param array $ids
     * @return DataTable[]
     */
    public function get(array $ids = []): array;

    /**
     * @param int $id
     * @return DataTable
     */
    public function getById(int $id): DataTable;

    /**
     * @return DataTable[]
     */
    public function allTables(): array;

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
