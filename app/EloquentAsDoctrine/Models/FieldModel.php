<?php

namespace App\EloquentAsDoctrine\Models;

use App\EloquentAsDoctrine\Collections\FieldCollection;
use App\EloquentAsDoctrine\Entities\FieldEntity;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FieldModel extends Model
{
    protected $entity = FieldEntity::class;
    protected $table = 'data_table_columns';

    /**
     * @return HasOne
     */
    public function dropdown()
    {
        $hasOne = $this->hasOne(DropdownModel::class, 'id', 'ddl_id');
        $hasOne->withDefault(false);
        return $hasOne;
    }

    /**
     * @param array $models
     * @return FieldCollection
     */
    public function newCollection(array $models = [])
    {
        return new FieldCollection($models);
    }
}
