<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Models\Datas\DataTableColumnModel;

class DataTableItemBase implements DataTableItemRepository
{

    /**
     * @inheritdoc
     */
    public function getForTables(iterable $table_ids): iterable
    {
        return DataTableColumnModel::whereIn('table_id', $table_ids)
            ->get()
            ->map(function (DataTableColumnModel $item) {
                return new DataTableColumn($item->toArray());
            });
    }



    /**
     * @inheritdoc
     */
    public function tableRelation(DataTable $dataTable): DataTable
    {
        $dataTable->columns = DataTableColumnModel::where('table_id', '=', $dataTable->id)
            ->get()
            ->map(function (DataTableColumnModel $model) {
                return new DataTableColumn($model->toArray());
            });
        return $dataTable;
    }

    /**
     * @inheritdoc
     */
    public function create(DataTableColumn $column): DataTableColumn
    {
        $created = DataTableColumnModel::create($column->toArray());
        return new DataTableColumn($created->toArray());
    }

    /**
     * @inheritdoc
     */
    public function update(DataTableColumn $column): DataTableColumn
    {
        $fils = (new DataTableColumnModel())->getFillable();
        $data = collect($column->toArray())->only($fils);
        DataTableColumnModel::where('id', '=', $column->id)
            ->update($data->toArray());
        return $column;
    }


}
