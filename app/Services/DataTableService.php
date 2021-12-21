<?php

namespace App\Services;

use App\Entities\Data\DataTable;
use App\Factories\RelationFactory;
use App\Factories\RepositoryFactory;
use App\Relations\TableColumnRelations;
use App\Relations\TableRelations;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class DataTableService
{
    /**
     * @var RepositoryFactory
     */
    protected $repos;

    /**
     * @var RelationFactory
     */
    protected $relations;

    /**
     *
     */
    public function __construct()
    {
        $this->repos = RepositoryFactory::instance();
        $this->relations = RelationFactory::instance();
    }

    /**
     * @param array $ids
     * @return DataTable[]
     */
    public function dataTablesWithItemsAndDropdowns(array $ids = []): array
    {
        $tables = $this->repos->dataTable()->get($ids);
        $this->relations->table()->setColumns($tables);
        $all_columns = collect($tables)->pluck('columns')->flatten()->toArray();
        $this->relations->tableColumn()->setDropdown($all_columns);
        return $tables;
    }
}
