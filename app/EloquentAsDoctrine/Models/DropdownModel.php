<?php

namespace App\EloquentAsDoctrine\Models;

use App\EloquentAsDoctrine\Collections\DropdownCollection;
use App\EloquentAsDoctrine\Entities\DropdownEntity;

class DropdownModel extends Model
{
    protected $entity = DropdownEntity::class;
    protected $table = 'dropdowns';

    /**
     * @param array $models
     * @return DropdownCollection
     */
    public function newCollection(array $models = [])
    {
        return new DropdownCollection($models);
    }
}
