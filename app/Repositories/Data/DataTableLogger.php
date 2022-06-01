<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
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
    public function get(array $ids = []): array
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

    /**
     * @param DataTable[]|DataTable $datas
     */
    public function relatedColumns(array|DataTable $datas): void
    {
        $this->repository->relatedColumns($datas);
    }

}
