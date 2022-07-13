<?php

namespace App\EloquentAsDoctrine\Repositories;

use App\EloquentAsDoctrine\Collections\FieldCollection;
use App\EloquentAsDoctrine\Entities\FieldEntity;

interface DropdownRepository
{
    public function loadForFields(FieldCollection|FieldEntity $data, string $columns = ''): void;
}
