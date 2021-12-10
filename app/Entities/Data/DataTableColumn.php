<?php

namespace App\Entities\Data;

use App\Entities\Dropdowns\Dropdown;
use App\Entities\Entity;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Arr;

class DataTableColumn extends Entity
{
    public ?int $id;
    public int $table_id;
    public ?int $ddl_id;
    public string $field;
    public string $header;
    public string $default = '';

    /**
     * @var Dropdown|null
     */
    public ?Dropdown $dropdown = null;
}
