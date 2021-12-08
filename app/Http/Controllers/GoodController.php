<?php

namespace App\Http\Controllers;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Entities\Dropdowns\Dropdown;
use App\Factories\RepositoryFactory;
use App\Factories\ServiceFactory;
use App\Models\Datas\DataTableModel;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    protected $tableRepo;
    protected $columnRepo;
    protected $dropRepo;

    /**
     *
     */
    public function __construct()
    {
        $this->tableRepo = RepositoryFactory::dataTable();
        $this->columnRepo = RepositoryFactory::dataTableItem();
        $this->dropRepo = RepositoryFactory::dropdown();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function tableById(Request $request)
    {
        $t = $this->tableRepo->getById($request->table_id);
        $t->columns = $this->columnRepo->tableRelation($t);
        $this->dropRepo->massColumnRelation(collect($t->columns));

        collect($t->columns)->map(function (DataTableColumn $column) {
            if ($column->dropdown) {
                $column->dropdown = $column->dropdown->only('id', 'name');
            }
        });
        return $t->toArray();
    }

    /**
     * @param Request $request
     * @return DataTable[]|\Illuminate\Support\Collection
     */
    public function allTables(Request $request)
    {
        $tables = $this->tableRepo->allTables();
        $this->columnRepo->massTableRelationCount($tables);
        return $tables;
    }

    public function updateTable(Request $request)
    {
        $t = new DataTable($request->fields);
        $t->id = $request->id;
        return $this->tableRepo->update($t);
    }

    /**
     * @param Request $request
     * @return DataTable
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function createTable(Request $request)
    {
        $t = new DataTable($request->all());
        return $this->tableRepo->create($t);
    }

    /**
     * @param Request $request
     * @return DataTableColumn
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
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
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function createColumn(Request $request)
    {
        $c = new DataTableColumn($request->all());
        return $this->columnRepo->create($c);
    }

    /**
     * @param Request $request
     * @return Dropdown
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
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
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function createDrop(Request $request)
    {
        $c = new Dropdown($request->all());
        return $this->dropRepo->create($c);
    }
}
