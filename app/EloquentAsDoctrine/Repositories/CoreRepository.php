<?php

namespace App\EloquentAsDoctrine\Repositories;

use App\EloquentAsDoctrine\Entities\Entity;
use App\EloquentAsDoctrine\Models\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class CoreRepository implements CoreInterface
{
    protected $model = Model::class;

    /**
     * @param Entity $data
     * @return int
     */
    public function create(Entity $data): int
    {
        $params = new $this->model($data->toArray());
        return $this->query()->insertGetId($params->toArray());
    }

    /**
     * @param Entity $data
     * @return bool
     */
    public function update(Entity $data): bool
    {
        $params = new $this->model($data->toArray());
        return $this->query()
            ->where('id', '=', $data->id)
            ->update($params->toArray());
    }

    /**
     * @param Entity $data
     * @return bool
     */
    public function delete(Entity $data): bool
    {
        return $this->query()
            ->where('id', '=', $data->id)
            ->delete();
    }
}
