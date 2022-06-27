<?php

namespace App\EloquentAsDoctrine\Models;

use App\EloquentAsDoctrine\Collections\Collection;
use App\EloquentAsDoctrine\Entities\Entity;

class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $entity = Entity::class;

    /**
     * @param Collection|Entity $items
     * @param string $relations
     */
    public static function loadRelations(Collection|Entity $items, string $relations)
    {
        $collection = $items instanceof Collection ? $items : new Collection([$items]);
        $model = new static();
        $query = $model->newQueryWithoutRelationships()->with($relations);
        $collection->setItems($query->eagerLoadRelations($collection->all()));
    }

    /**
     * @param array $attributes
     * @param null $connection
     * @return mixed
     */
    public function newFromBuilder($attributes = [], $connection = null)
    {
        return new $this->entity($attributes);
    }

    /**
     * @param array $models
     * @return Collection
     */
    public function newCollection(array $models = [])
    {
        return new Collection($models);
    }
}
