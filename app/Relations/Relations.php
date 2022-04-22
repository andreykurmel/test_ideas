<?php

namespace App\Relations;

use Illuminate\Support\Arr;

trait Relations
{
    /**
     * @param mixed $datas
     * @param string $field
     * @return array
     */
    protected function pluck(mixed $datas, string $field): array
    {
        $array = is_array($datas) ? $datas : [$datas];
        return Arr::pluck($array, $field);
    }

    /**
     * @param mixed $parents
     * @param string $field
     * @param array $related
     * @param string $localKey
     * @param string $foreignKey
     * @param bool $first
     */
    protected function has(mixed $parents, string $field, array $related, string $localKey, string $foreignKey, bool $first): void
    {
        $array = is_array($parents) ? $parents : [$parents];

        $related = collect($related);

        foreach ($array as $parent) {
            $found = $related->where($foreignKey, $parent->$localKey);
            $parent->$field = $first ? $found->first() : $found->toArray();
        }
    }

    /**
     * @param mixed $parents
     * @param string $field
     * @param array $related
     * @param string $localKey
     * @param string $foreignKey
     */
    protected function hasOne(mixed $parents, string $field, array $related, string $localKey, string $foreignKey): void
    {
        $this->has($parents, $field, $related, $localKey, $foreignKey, true);
    }

    /**
     * @param mixed $parents
     * @param string $field
     * @param array $related
     * @param string $localKey
     * @param string $foreignKey
     */
    protected function hasMany(mixed $parents, string $field, array $related, string $localKey, string $foreignKey): void
    {
        $this->has($parents, $field, $related, $localKey, $foreignKey, false);
    }
}
