<?php

namespace App\Repositories\Dropdowns;

use App\Collections\Data\CollectionDataTableColumn;
use App\Collections\Dropdowns\CollectionDropdown;
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
    public function get(array $ids): CollectionDropdown
    {
        $rows = DropdownModel::whereIn('id', $ids)
                ->get()
                ->map(function (DropdownModel $model) {
                    return new Dropdown($model->toArray());
                });
        return new CollectionDropdown($rows);
    }

    /**
     * @param CollectionDataTableColumn $collection
     * @return CollectionDataTableColumn
     */
    public function relatedDropdowns(CollectionDataTableColumn $collection): CollectionDataTableColumn
    {
        $drops = $this->get($collection->pluck('ddl_id')->toArray());
        $collection->each(function (DataTableColumn $item) use ($drops) {
            $item->dropdown = $drops->where('id', '=', $item->ddl_id)->first();
        });
        return $collection;
    }

}
