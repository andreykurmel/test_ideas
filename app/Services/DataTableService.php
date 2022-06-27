<?php

namespace App\Services;

use App\Entities\Data\CollectionDataTable;
use App\Entities\Data\DataTable;
use App\Factories\RelationFactory;
use App\Factories\RepositoryFactory;
use App\Models\Datas\DataTableModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class DataTableService
{
    /**
     * @param array $ids
     * @return DataTable[]
     */
    public function dataTablesWithItemsAndDropdowns(array $ids = [])
    {
        $tables = RepositoryFactory::dataTable()->get($ids);
        $col = new CollectionDataTable($tables);
        $col->loadItems();
        $tb = $col->first();
        $tb->items();
        return 'test';
        dd($tb, $tb->items());

        /*$before = memory_get_usage();
        $ret = new DataTable(Arr::first($tables)->toArray());
        $after = memory_get_usage();

        $before1 = memory_get_usage();
        $ret = new DataTableModel(Arr::first($tables)->toArray());
        $after1 = memory_get_usage();
        dd($after - $before, $after1 - $before1);*/

        RepositoryFactory::dataTable()->relatedColumns($tables);
        $columns = collect($tables)->pluck('columns')->flatten()->toArray();
        RepositoryFactory::dataTableItem()->relatedDropdown($columns);
        return $tables;
    }
}
