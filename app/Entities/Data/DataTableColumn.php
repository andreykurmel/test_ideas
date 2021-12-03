<?php

namespace App\Entities\Data;

use App\Entities\Entity;

class DataTableColumn extends Entity
{
    public int $id;
    public int $table_id;
    public ?int $ddl_id;
    public string $field;
    public string $header;
    public string $default = '';
}