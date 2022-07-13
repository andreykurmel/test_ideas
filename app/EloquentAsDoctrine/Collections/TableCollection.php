<?php

namespace App\EloquentAsDoctrine\Collections;

use App\EloquentAsDoctrine\RepoFactory;

class TableCollection extends Collection
{
    /**
     * Syntax sugar, so developer can load relations easily.
     * @param string $columns
     */
    public function loadFields(string $columns = ''): void
    {
        RepoFactory::fields()->loadFieldsForTable($this, $columns);
    }
}
