<?php

namespace App\Repositories\Data;

use App\Entities\Collection;
use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Factories\RepositoryFactory;
use App\Models\Datas\DataTableColumnModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class DataTableItemBase implements DataTableItemRepository
{
    protected Collection $collection;

    protected array $relations = ['table'];
    protected array $loadedRelations = [];

    public function __construct()
    {
        $this->collection = new Collection();

        foreach ($this->relations as $relation) {
            $this->loadedRelations[$relation] = new Collection();
        }
    }

    /**
     * @param array $table_ids
     * @return array
     * @throws UnknownProperties
     */
    public function getbyTableId(array $table_ids): array
    {
        return DB::table('data_table_columns')
            ->whereIn('table_id', $table_ids)
            ->get()
            ->map(function ($model) {
                return new DataTableColumn((array)$model);
            })
            ->toArray();
    }

    /**
     * @param array $table_ids
     * @return array
     * @throws UnknownProperties
     */
    public function relatedToTable(Collection|DataTable $table): Collection
    {
        $ids = Collection::wrap($table)->pluck('id');

        if ($this->loadedRelations['table']->intersect($ids)->count()) {
            return $this->collection->whereIn('table_id', $ids);
        }

        $query = DB::table('data_table_columns');
        $query->whereIn('table_id', $ids);

        $columns = new Collection($query->get()->map(function ($model) {
            return new DataTableColumn((array)$model);
        }));

        $this->loadedRelations['table'] = $this->loadedRelations['table']->merge($ids)->unique();
        $this->collection = $this->collection->merge($columns)->unique('id');

        return $columns;
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
