<?php

namespace App\Http\Controllers;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Factories\RepositoryFactory;
use App\Factories\ServiceFactory;
use App\Models\Datas\DataTableModel;
use Illuminate\Http\Request;

class HardController extends Controller
{
    protected $tableRepo;
    protected $columnRepo;

    public function __construct()
    {
        $this->tableRepo = RepositoryFactory::dataTable();
        $this->columnRepo = RepositoryFactory::dataTableItem();
    }

    public function tableById(Request $request)
    {
        $t = $this->tableRepo->getById($request->table_id);
        $this->columnRepo->tableRelation($t);
        return $t;
    }

    public function allTables(Request $request)
    {
        $tables = $this->tableRepo->allTables();
        return $tables->map(function (DataTable $i) {
            return $i->only('id','name')->toArray();
        });
    }

    public function updateTable(Request $request)
    {
        $t = new DataTable($request->fields);
        $t->id = $request->id;
        return $this->tableRepo->update($t);
    }

    public function createTable(Request $request)
    {
        $t = new DataTable($request->all());
        return $this->tableRepo->create($t);
    }

    public function updateColumn(Request $request)
    {
        $c = new DataTableColumn($request->fields);
        $c->id = $request->id;
        return $this->columnRepo->update($c);
    }

    public function createColumn(Request $request)
    {
        $c = new DataTableColumn($request->all());
        return $this->columnRepo->create($c);
    }
}
