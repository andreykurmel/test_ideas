<?php

namespace App\EloquentAsDoctrine\Entities;

interface EloquentInterface
{
    /**
     * @param $key
     * @return mixed
     */
    public function __get($key);

    /**
     * @param $key
     * @return mixed
     */
    public function getAttribute($key);

    /**
     * @return mixed
     */
    public function getKey();

    /**
     * @param $relation
     * @param $value
     * @return mixed
     */
    public function setRelation($relation, $value);
}
