<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use Illuminate\Support\Facades\Cache;

class DataTableCacher implements DataTableRepository
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
        return Cache::rememberForever('data_table_'.$id, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    /**
     * @inheritdoc
     */
    public function create(DataTable $dataTable): DataTable
    {
        Cache::forget('data_tables_all');
        return $this->repository->create($dataTable);
    }

    /**
     * @inheritdoc
     */
    public function update(DataTable $dataTable): DataTable
    {
        Cache::forget('data_tables_all');
        Cache::forget('data_table_'.$dataTable->id);
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
