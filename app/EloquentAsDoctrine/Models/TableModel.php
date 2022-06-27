<?php

namespace App\EloquentAsDoctrine\Models;

use App\EloquentAsDoctrine\Collections\TableCollection;
use App\EloquentAsDoctrine\Entities\TableEntity;

class TableModel extends Model
{
    protected $entity = TableEntity::class;
    protected $table = 'data_tables';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(FieldModel::class, 'table_id', 'id');
    }

    /**
     * @param array $models
     * @return TableCollection
     */
    public function newCollection(array $models = [])
    {
        return new TableCollection($models);
    }
}
