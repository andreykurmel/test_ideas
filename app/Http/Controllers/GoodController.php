<?php

namespace App\Http\Controllers;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Entities\Dropdowns\Dropdown;
use App\Factories\RepositoryFactory;
use App\Factories\ServiceFactory;
use App\Relations\TableColumnRelations;
use App\Relations\TableRelations;
use App\Services\DataTableService;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class GoodController extends Controller
{
    protected $tableRepo;
    protected $columnRepo;
    protected $dropRepo;
    protected $dataTableService;

    /**
     *
     */
    public function __construct()
    {
        $this->tableRepo = RepositoryFactory::dataTable();
        $this->columnRepo = RepositoryFactory::dataTableItem();
        $this->dropRepo = RepositoryFactory::dropdown();
        $this->dataTableService = ServiceFactory::dataTable();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function tableById(Request $request)
    {
        $t = $this->tableRepo->getById($request->table_id);
        TableRelations::setColumns($t);
        TableColumnRelations::setDropdown($t->columns);

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
        return $this->dataTableService->dataTablesWithItemsAndDropdowns($request->ids ?: []);
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
        return $this->tableRepo->update($t);
    }

    /**
     * @param Request $request
     * @return DataTable
     * @throws UnknownProperties
     */
    public function createTable(Request $request)
    {
        $t = new DataTable($request->all());
        return $this->tableRepo->create($t);
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
        return $this->columnRepo->update($c);
    }

    /**
     * @param Request $request
     * @return DataTableColumn
     * @throws UnknownProperties
     */
    public function createColumn(Request $request)
    {
        $c = new DataTableColumn($request->all());
        return $this->columnRepo->create($c);
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
        return $this->dropRepo->update($d);
    }

    /**
     * @param Request $request
     * @return Dropdown
     * @throws UnknownProperties
     */
    public function createDrop(Request $request)
    {
        $c = new Dropdown($request->all());
        return $this->dropRepo->create($c);
    }
}
