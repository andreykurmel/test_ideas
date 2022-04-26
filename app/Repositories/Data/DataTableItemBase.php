<?php

namespace App\Repositories\Data;

use App\Collections\Data\CollectionDataTable;
use App\Collections\Data\CollectionDataTableColumn;
use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Models\Datas\DataTableColumnModel;
use Illuminate\Support\Arr;

class DataTableItemBase implements DataTableItemRepository
{
    /**
     * @param array $table_ids
     * @return CollectionDataTableColumn
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function getbyTableId(array $table_ids): CollectionDataTableColumn
    {
        $rows = DataTableColumnModel::whereIn('table_id', $table_ids)
            ->get()
            ->map(function (DataTableColumnModel $model) {
                return new DataTableColumn($model->toArray());
            });
        return new CollectionDataTableColumn($rows);
    }

    /**
     * @param DataTableColumn $column
     * @return DataTableColumn
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function create(DataTableColumn $column): DataTableColumn
    {
        $created = DataTableColumnModel::create($column->toArray());
        return new DataTableColumn($created->toArray());
    }

    /**
     * @param DataTableColumn $column
     * @return DataTableColumn
     */
    public function update(DataTableColumn $column): DataTableColumn
    {
        $data = new DataTableColumnModel($column->toArray());
        DataTableColumnModel::where('id', '=', $column->id)
            ->update($data->toArray());
        return $column;
    }

    /**
     * @param CollectionDataTable $collection
     * @return CollectionDataTable
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function relationColumns(CollectionDataTable $collection): CollectionDataTable
    {
        $columns = $this->getbyTableId($collection->pluck('id')->toArray());
        $collection->each(function (DataTable $item) use ($columns) {
            $item->columns = $columns->where('table_id', '=', $item->id)->values();
        });
        return $collection;
    }

}
