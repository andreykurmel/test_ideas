<?php

namespace App\Entities\Data;

use App\Collections\Data\CollectionDataTableColumn;
use App\Entities\Entity;

class DataTable extends Entity
{
    public ?int $id;
    public int $user_id;
    public string $name;
    public string $db_name;
    public string $notes = '';

    /**
     * @var CollectionDataTableColumn|null
     */
    public ?CollectionDataTableColumn $columns = null;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = parent::toArray();
        if (is_null($this->columns)) {
            unset($array['columns']);
        }
        return $array;
    }
}
