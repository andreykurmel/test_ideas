<?php

namespace App\EloquentAsDoctrine\Repositories;

use App\EloquentAsDoctrine\Collections\FieldCollection;
use App\EloquentAsDoctrine\Entities\FieldEntity;
use App\EloquentAsDoctrine\Models\DropdownModel;
use App\EloquentAsDoctrine\Models\FieldModel;

class DropdownBaseRepository extends CoreRepository implements DropdownRepository
{
    protected $model = DropdownModel::class;

    /**
     * @param FieldCollection|FieldEntity $data
     * @param string $columns
     */
    public function loadForFields(FieldCollection|FieldEntity $data, string $columns = ''): void
    {
        FieldModel::loadRelations($data, $columns ? "dropdown:$columns" : "dropdown");
    }
}
