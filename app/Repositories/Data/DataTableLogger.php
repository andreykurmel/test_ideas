<?php

namespace App\Repositories\Data;

use App\Collections\Data\CollectionDataTable;
use App\Entities\Data\DataTable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class DataTableLogger implements DataTableRepository
{
    /**
     * @param DataTableRepository $repository
     */
    public function __construct(protected DataTableRepository $repository)
    {
    }

    /**
     * @inheritdoc
     */
    public function get(array $ids = []): CollectionDataTable
    {
        return $this->repository->get($ids);
    }

    /**
     * @inheritdoc
     */
    public function find(int $id): DataTable
    {
        return $this->repository->find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(DataTable $dataTable): DataTable
    {
        Log::info('table created');
        return $this->repository->create($dataTable);
    }

    /**
     * @inheritdoc
     */
    public function update(DataTable $dataTable): DataTable
    {
        Log::info('table update');
        return $this->repository->update($dataTable);
    }

}
