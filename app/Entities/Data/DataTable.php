<?php

namespace App\Entities\Data;

use App\Entities\Entity;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Collection;

class DataTable extends Entity
{
    protected array $exceptKeys = ['columns'];

    public ?int $id;
    public int $user_id;
    public string $name;
    public string $db_name;
    public string $notes = '';

    /**
     * @var Collection<DataTableColumn>|null
     */
    public ?Collection $columns;
    public ?int $columns_count;

    /**
     * @return Collection
     */
    public function columns(): Collection
    {
        if (!$this->columns) {
            RepositoryFactory::dataTableItem()->tableRelation($this);
        }
        return $this->columns;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = parent::toArray();
        if ($this->columns) {
            $array['columns'] = $this->columns
                ->map(function (DataTableColumn $column) {
                    return $column->toArray();
                })
                ->toArray();
        }
        return $array;
    }
}
