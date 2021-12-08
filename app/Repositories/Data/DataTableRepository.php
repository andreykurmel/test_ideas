<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use Illuminate\Support\Collection;

interface DataTableRepository
{
    /**
     * @param array $ids
     * @return Collection<DataTable>|DataTable[]
     */
    public function get(array $ids = []): Collection;



    /**
     * @param int $id
     * @return DataTable
     */
    public function getById(int $id): DataTable;

    /**
     * @return Collection<DataTable>|DataTable[]
     */
    public function allTables(): Collection;

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
