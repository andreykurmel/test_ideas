<?php

namespace App\EloquentAsDoctrine\Repositories;

use App\EloquentAsDoctrine\Collections\TableCollection;
use App\EloquentAsDoctrine\Entities\TableEntity;
use App\EloquentAsDoctrine\Models\FieldModel;
use App\EloquentAsDoctrine\Models\TableModel;

class FieldBaseRepository extends CoreRepository implements FieldRepository
{
    protected $model = FieldModel::class;

    /**
     * @param TableCollection|TableEntity $data
     * @param string $columns
     */
    public function loadFieldsForTable(TableCollection|TableEntity $data, string $columns = ''): void
    {
        TableModel::loadRelations($data, $columns ? "fields:$columns" : "fields");
    }
}
