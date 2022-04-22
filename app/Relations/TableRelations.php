<?php

namespace App\Relations;

use App\Entities\Data\DataTable;
use App\Factories\RepositoryFactory;
use Illuminate\Support\Arr;

class TableRelations
{
    use Relations;

    /**
     * @var RepositoryFactory
     */
    protected $repos;

    /**
     *
     */
    public function __construct()
    {
        $this->repos = RepositoryFactory::instance();
    }

    /**
     * @param DataTable[]|DataTable $data_tables
     */
    public function setColumns(array|DataTable $data_tables): void
    {
        $columns = $this->repos->dataTableItem()->getbyTableId($this->pluck($data_tables, 'id'));
        $this->hasMany($data_tables, 'columns', $columns, 'id', 'table_id');
    }
}
