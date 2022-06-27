<?php

namespace App\EloquentAsDoctrine\Repositories;

use App\EloquentAsDoctrine\Entities\Entity;

interface CoreInterface
{
    public function create(Entity $data): int;

    public function update(Entity $data): bool;

    public function delete(Entity $data): bool;
}
