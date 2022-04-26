<?php

namespace App\Services;

use App\Collections\Data\CollectionDataTable;
use App\Collections\Data\CollectionDataTableColumn;
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
     * @return CollectionDataTable
     */
    public function dataTablesWithItemsAndDropdowns(array $ids = []): CollectionDataTable
    {
        $tables = $this->repos->dataTable()->get($ids);
        $tables->loadColumns();
        $cols = new CollectionDataTableColumn($tables->pluck('columns')->flatten());
        $cols->loadDropdown();
        return $tables;
    }
}
