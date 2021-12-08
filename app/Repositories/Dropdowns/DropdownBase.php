<?php

namespace App\Repositories\Dropdowns;

use App\Entities\Dropdowns\Dropdown;
use App\Models\Dropdowns\DropdownModel;
use Illuminate\Support\Collection;

class DropdownBase implements DropdownRepository
{

    /**
     * @inheritDoc
     */
    public function create(Dropdown $dropdown): Dropdown
    {
        $created = DropdownModel::create($dropdown->toArray());
        return new Dropdown($created->toArray());
    }

    /**
     * @inheritDoc
     */
    public function update(Dropdown $dropdown): Dropdown
    {
        $data = new DropdownModel($dropdown->toArray());
        DropdownModel::where('id', '=', $dropdown->id)
            ->update($data->toArray());
        return $dropdown;
    }

    /**
     * @inheritDoc
     */
    public function massColumnRelation(Collection $columns): Collection
    {
        $ids = $columns->pluck('ddl_id');
        $ddls = DropdownModel::whereIn('id', $ids)
            ->get()
            ->map(function (DropdownModel $model) {
                return new Dropdown($model->toArray());
            });

        foreach ($columns as $col) {
            $col->dropdown = $ddls->where('id', '=', $col->ddl_id)->first();
        }

        return $columns;
    }
}
