<?php

namespace App\Entities\Data;

use App\Entities\Entity;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class DataTable extends Entity
{
    public ?int $id;
    public int $user_id;
    public string $name;
    public string $db_name;
    public string $notes = '';

    /**
     * @var DataTableColumn[]|null
     */
    protected ?array $columns = null;

    /**
     * @return DataTableColumn[]|null
     */
    public function columns(): array|null
    {
        $columns = RepositoryFactory::instance()->dataTableItem()->getbyTableId([$this->id]);
        $this->hasMany($this, 'columns', $columns, 'table_id', 'id');
        return $this->columns;
    }

    /**
     * @var int|null
     */
    public ?int $columns_count = null;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = parent::toArray();
        if (is_null($this->columns)) {
            unset($array['columns']);
        }
        if (is_null($this->columns_count)) {
            unset($array['columns_count']);
        }
        return $array;
    }
}
