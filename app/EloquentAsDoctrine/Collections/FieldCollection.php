<?php

namespace App\EloquentAsDoctrine\Collections;

use App\EloquentAsDoctrine\RepoFactory;

class FieldCollection extends Collection
{

    /**
     * Syntax sugar, so developer can load relations easily.
     * @param string $columns
     */
    public function loadDropdown(string $columns = ''): void
    {
        RepoFactory::dropdowns()->loadForFields($this, $columns);
    }
}
