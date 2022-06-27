<?php

namespace App\Entities;

class Collection extends \Illuminate\Support\Collection
{
    /**
     * @param mixed $value
     * @return Collection
     */
    public static function wrap(mixed $value): Collection
    {
        if (is_null($value)) {
            return new Collection([]);
        }

        return $value instanceof Collection ? $value : new Collection([$value]);
    }
}
