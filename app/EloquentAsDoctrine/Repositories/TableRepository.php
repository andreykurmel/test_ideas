<?php

namespace App\EloquentAsDoctrine\Repositories;

use App\EloquentAsDoctrine\Collections\TableCollection;

interface TableRepository
{
    /**
     * @return TableCollection
     */
    public function all(): TableCollection;

    /**
     * @param string $field
     * @param mixed|null $value
     * @param string $operator
     * @return TableCollection
     */
    public function getBy(string $field, mixed $value = null, string $operator = '='): TableCollection;
}
