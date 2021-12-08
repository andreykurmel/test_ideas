<?php

namespace App\Entities\Data;

use App\Entities\Entity;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Collection;

class DataTable extends Entity
{
    public ?int $id;
    public int $user_id;
    public string $name;
    public string $db_name;
    public string $notes = '';

    /**
     * @var Collection<DataTableColumn>|null
     */
    public ?Collection $columns;

    /**
     * @return Collection
     */
    public function columns(): Collection
    {
        if (!$this->columns) {
            $this->columns = RepositoryFactory::dataTableItem()->tableRelation($this);
        }
        return $this->columns;
    }
}
