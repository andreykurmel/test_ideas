<?php

namespace App\Entities\Data;

use App\Entities\Entity;

class DataTable extends Entity
{
    public int $id;
    public int $user_id;
    public string $name;
    public string $db_name;
    public string $notes = '';
}
