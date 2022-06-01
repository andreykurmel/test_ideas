<?php

namespace App\Repositories\Dropdowns;

use App\Entities\Data\DataTableColumn;
use App\Entities\Dropdowns\Dropdown;
use App\Models\Dropdowns\DropdownModel;
use Illuminate\Support\Arr;
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
    public function get(array $ids): array
    {
        return DropdownModel::whereIn('id', $ids)
            ->get()
            ->map(function (DropdownModel $model) {
                return new Dropdown($model->toArray());
            })
            ->toArray();
    }

}
