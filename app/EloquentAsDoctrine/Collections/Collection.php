<?php

namespace App\EloquentAsDoctrine\Collections;

class Collection extends \Illuminate\Database\Eloquent\Collection
{
    public function setItems($items = [])
    {
        $this->items = $this->getArrayableItems($items);
    }

    public function load($relations)
    {
        $this->forbidden();
    }

    public function loadAggregate($relations, $column, $function = null)
    {
        $this->forbidden();
    }

    public function loadMissing($relations)
    {
        $this->forbidden();
    }

    public function loadMorph($relation, $relations)
    {
        $this->forbidden();
    }

    public function loadMorphCount($relation, $relations)
    {
        $this->forbidden();
    }

    protected function forbidden()
    {
        throw new \Exception('Eager loading is available via Repositories');
    }

}
