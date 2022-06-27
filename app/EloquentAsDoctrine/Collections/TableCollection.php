<?php

namespace App\EloquentAsDoctrine\Collections;

use App\EloquentAsDoctrine\RepoFactory;

class TableCollection extends Collection
{
    public function loadFields(): void
    {
        RepoFactory::fields()->loadFieldsForTable($this);
    }
}
