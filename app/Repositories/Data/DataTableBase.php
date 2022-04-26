<?php

namespace App\Repositories\Data;

use App\Collections\Data\CollectionDataTable;
use App\Entities\Data\DataTable;
use App\Factories\RepositoryFactory;
use App\Models\Datas\DataTableModel;
use Illuminate\Support\Collection;

class DataTableBase implements DataTableRepository
{

    /**
     * @inheritdoc
     */
    public function get(array $ids = []): CollectionDataTable
    {
        $rows = $ids
            ? DataTableModel::whereIn('id', $ids)->get()
            : DataTableModel::all();

        $rows = $rows
            ->map(function (DataTableModel $item) {
                return new DataTable($item->toArray());
            });

        return new CollectionDataTable($rows);
    }

    /**
     * @inheritdoc
     */
    public function find(int $id): DataTable
    {
        $m = DataTableModel::where('id', '=', $id)->first();
        return new DataTable($m->toArray());
    }

    /**
     * @inheritdoc
     */
    public function create(DataTable $dataTable): DataTable
    {
        $created = DataTableModel::create($dataTable->toArray());
        return new DataTable($created->toArray());
    }

    /**
     * @inheritdoc
     */
    public function update(DataTable $dataTable): DataTable
    {
        $fils = (new DataTableModel())->getFillable();
        $data = collect($dataTable->toArray())->only($fils);
        DataTableModel::where('id', '=', $dataTable->id)
            ->update($data->toArray());
        return $dataTable;
    }


}
