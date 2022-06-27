<?php

namespace App\EloquentAsDoctrine\Repositories;

use App\EloquentAsDoctrine\Collections\TableCollection;
use App\EloquentAsDoctrine\Entities\TableEntity;

interface FieldRepository
{
    public function loadFieldsForTable(TableCollection|TableEntity $data, string $columns = ''): void;
}
