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
     * @param string $local_key
     * @param string $foreign_key
     */
    protected function hasOne(mixed $parents, string $field, array $related, string $local_key, string $foreign_key): void
    {
        $array = is_array($parents) ? $parents : [$parents];

        $related = collect($related);

        foreach ($array as $parent) {
            $parent->$field = $related->where($foreign_key, '=', $parent->$local_key)->first();
        }
    }

    /**
     * @param mixed $parents
     * @param string $field
     * @param array $related
     * @param string $local_key
     * @param string $foreign_key
     */
    protected function hasMany(mixed $parents, string $field, array $related, string $local_key, string $foreign_key): void
    {
        $array = is_array($parents) ? $parents : [$parents];

        $related = collect($related);

        foreach ($array as $parent) {
            $parent->$field = $related->where($foreign_key, '=', $parent->$local_key)->toArray();
        }
    }
}
