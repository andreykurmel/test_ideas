<?php

namespace App\Http\Controllers;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Entities\Dropdowns\Dropdown;
use App\Factories\RelationFactory;
use App\Factories\RepositoryFactory;
use App\Factories\ServiceFactory;
use App\Relations\TableColumnRelations;
use App\Relations\TableRelations;
use App\Services\DataTableService;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class GoodController extends Controller
{
    protected $repositories;
    protected $relations;
    protected $services;

    /**
     *
     */
    public function __construct()
    {
        $this->repositories = RepositoryFactory::instance();
        $this->relations = RelationFactory::instance();
        $this->services = ServiceFactory::instance();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function tableById(Request $request)
    {
        $t = $this->repositories->dataTable()->getById($request->table_id);
        $this->relations->table()->setColumns($t);
        $this->relations->tableColumn()->setDropdown($t->columns);

        foreach ($t->columns as $column) {
            $column->only('id', 'field', 'header', 'dropdown');
            $column->dropdown?->only('id', 'name');
        }

        return $t->toArray();
    }

    /**
     * @param Request $request
     * @return DataTable[]
     */
    public function allTables(Request $request)
    {
        return $this->services->dataTable()->dataTablesWithItemsAndDropdowns($request->ids ?: []);
    }

    /**
     * @param Request $request
     * @return DataTable
     * @throws UnknownProperties
     */
    public function updateTable(Request $request)
    {
        $t = new DataTable($request->fields);
        $t->id = $request->id;
        return $this->repositories->dataTable()->update($t);
    }

    /**
     * @param Request $request
     * @return DataTable
     * @throws UnknownProperties
     */
    public function createTable(Request $request)
    {
        $t = new DataTable($request->all());
        return $this->repositories->dataTable()->create($t);
    }

    /**
     * @param Request $request
     * @return DataTableColumn
     * @throws UnknownProperties
     */
    public function updateColumn(Request $request)
    {
        $c = new DataTableColumn($request->fields);
        $c->id = $request->id;
        return $this->repositories->dataTableItem()->update($c);
    }

    /**
     * @param Request $request
     * @return DataTableColumn
     * @throws UnknownProperties
     */
    public function createColumn(Request $request)
    {
        $c = new DataTableColumn($request->all());
        return $this->repositories->dataTableItem()->create($c);
    }

    /**
     * @param Request $request
     * @return Dropdown
     * @throws UnknownProperties
     */
    public function updateDrop(Request $request)
    {
        $d = new Dropdown($request->fields);
        $d->id = $request->id;
        return $this->repositories->dropdown()->update($d);
    }

    /**
     * @param Request $request
     * @return Dropdown
     * @throws UnknownProperties
     */
    public function createDrop(Request $request)
    {
        $c = new Dropdown($request->all());
        return $this->repositories->dropdown()->create($c);
    }
}
