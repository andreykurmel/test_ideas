<?php

namespace App\EloquentAsDoctrine\Models;

use App\EloquentAsDoctrine\Collections\FieldCollection;
use App\EloquentAsDoctrine\Entities\FieldEntity;

class FieldModel extends Model
{
    protected $entity = FieldEntity::class;
    protected $table = 'data_table_columns';

    /**
     * @param array $models
     * @return FieldCollection
     */
    public function newCollection(array $models = [])
    {
        return new FieldCollection($models);
    }
}
