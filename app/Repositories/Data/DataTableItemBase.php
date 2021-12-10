<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Models\Datas\DataTableColumnModel;
use Illuminate\Support\Arr;

class DataTableItemBase implements DataTableItemRepository
{
    /**
     * @inheritdoc
     */
    public function getbyTableId(array $table_ids): array
    {
        return DataTableColumnModel::whereIn('table_id', $table_ids)
            ->get()
            ->map(function (DataTableColumnModel $model) {
                return new DataTableColumn($model->toArray());
            })
            ->toArray();
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
        $data = new DataTableColumnModel($column->toArray());
        DataTableColumnModel::where('id', '=', $column->id)
            ->update($data->toArray());
        return $column;
    }

}
