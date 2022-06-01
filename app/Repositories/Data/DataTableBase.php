<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Factories\RepositoryFactory;
use App\Models\Datas\DataTableModel;
use Illuminate\Support\Arr;

class DataTableBase implements DataTableRepository
{

    /**
     * @inheritdoc
     */
    public function get(array $ids = []): array
    {
        $rows = $ids
            ? DataTableModel::whereIn('id', $ids)->get()
            : DataTableModel::all();

        return $rows
            ->map(function (DataTableModel $item) {
                return new DataTable($item->toArray());
            })
            ->toArray();
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

    /**
     * @param DataTable[]|DataTable $datas
     */
    public function relatedColumns(array|DataTable $datas): void
    {
        $tables = $datas instanceof DataTable ? [$datas] : $datas;
        $columns = RepositoryFactory::dataTableItem()->getbyTableId(Arr::pluck($tables, 'id'));
        collect($tables)->each(function (DataTable $item) use ($columns) {
            $item->columns = collect($columns)
                ->where('table_id', '=', $item->id)
                ->values()
                ->toArray();
        });
    }

}
