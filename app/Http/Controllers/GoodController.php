<?php

namespace App\Http\Controllers;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Entities\Dropdowns\Dropdown;
use App\Factories\RelationFactory;
use App\Factories\RepositoryFactory;
use App\Factories\ServiceFactory;
use App\Services\DataTableService;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class GoodController extends Controller
{
    protected $services;

    /**
     *
     */
    public function __construct()
    {
        $this->services = ServiceFactory::instance();
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
        return RepositoryFactory::dataTable()->update($t);
    }

    /**
     * @param Request $request
     * @return DataTable
     * @throws UnknownProperties
     */
    public function createTable(Request $request)
    {
        $t = new DataTable($request->all());
        return RepositoryFactory::dataTable()->create($t);
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
        return RepositoryFactory::dataTableItem()->update($c);
    }

    /**
     * @param Request $request
     * @return DataTableColumn
     * @throws UnknownProperties
     */
    public function createColumn(Request $request)
    {
        $c = new DataTableColumn($request->all());
        return RepositoryFactory::dataTableItem()->create($c);
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
        return RepositoryFactory::dropdown()->update($d);
    }

    /**
     * @param Request $request
     * @return Dropdown
     * @throws UnknownProperties
     */
    public function createDrop(Request $request)
    {
        $c = new Dropdown($request->all());
        return RepositoryFactory::dropdown()->create($c);
    }
}
