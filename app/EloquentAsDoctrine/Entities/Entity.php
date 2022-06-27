<?php

namespace App\EloquentAsDoctrine\Entities;

use App\EloquentAsDoctrine\Entities\EloquentInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

class Entity implements EloquentInterface, Arrayable
{
    /**
     * @var array
     */
    protected $attributes = [];
    /**
     * @var array
     */
    protected $relations = [];

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        $this->attributes = (array)$attributes;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function __get($key)
    {
        return $this->getAttribute($key) ?? $this->getRelation($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function getAttribute($key)
    {
        return $this->attributes[$key] ?? null;
    }

    /**
     * @param $relation
     * @return mixed|null
     */
    public function getRelation($relation)
    {
        return $this->relations[$relation] ?? null;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * @return mixed|null
     */
    public function getKey()
    {
        return $this->getAttribute('id');
    }

    /**
     * @param $relation
     * @param $value
     * @return $this
     */
    public function setRelation($relation, $value)
    {
        $this->relations[$relation] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge($this->attributes, $this->relations);
    }
}
