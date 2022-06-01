<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTableColumn;
use App\Factories\RepositoryFactory;
use App\Models\Datas\DataTableColumnModel;
use Illuminate\Support\Arr;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class DataTableItemBase implements DataTableItemRepository
{
    /**
     * @param array $table_ids
     * @return array
     * @throws UnknownProperties
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
     * @param DataTableColumn $column
     * @return DataTableColumn
     * @throws UnknownProperties
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
     * @param DataTableColumn[]|DataTableColumn $datas
     */
    public function relatedDropdown(array|DataTableColumn $datas): void
    {
        $columns = $datas instanceof DataTableColumn ? [$datas] : $datas;
        $drops = RepositoryFactory::dropdown()->get(Arr::pluck($columns, 'ddl_id'));
        collect($columns)->each(function (DataTableColumn $item) use ($drops) {
            $item->dropdown = collect($drops)
                ->where('id', '=', $item->ddl_id)
                ->first();
        });
    }

}
