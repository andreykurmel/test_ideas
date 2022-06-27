<?php

namespace App\Entities\Data;

use App\Entities\Collection;
use App\Entities\Entity;
use App\Factories\RepositoryFactory;

class DataTable extends Entity
{
    public ?int $id;
    public int $user_id;
    public string $name;
    public string $db_name;
    public string $notes = '';

    /**
     * @var Collection|null
     */
    public ?Collection $columns = null;

    public function items()
    {
        if (!$this->columns) {
            $this->columns = RepositoryFactory::dataTableItem()->relatedToTable($this);
        }
        return $this->columns;
    }

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
