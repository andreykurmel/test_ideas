<?php

namespace App\Http\Controllers;

use App\Factories\RepositoryFactory;
use App\Factories\ServiceFactory;
use App\Models\Datas\DataTableModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        //dd(ServiceFactory::dataTable()->dataTablesWithItems([2,3,4]));

        $cont = new HardController();
        dd(
            $cont->tableById(new Request(['table_id'=>2])),
            $cont->allTables(new Request()),
            /*$cont->createTable(new Request(['user_id'=>1,'name'=>'controller','db_name'=>'database'])),
            $cont->updateTable(new Request(['id'=>5, 'fields'=>['user_id'=>1,'name'=>'controller','db_name'=>'changed']])),
            $cont->createColumn(new Request(['table_id'=>5,'field'=>'controller','header'=>'database'])),
            $cont->updateColumn(new Request(['id'=>5, 'fields'=>['table_id'=>5,'field'=>'controller','header'=>'changed']])),*/
        );

        $cont = new SoftController();
        dd(
            $cont->tableById(new Request(['table_id'=>2])),
            $cont->allTables(new Request()),
            /*$cont->createTable(new Request(['user_id'=>1,'name'=>'controller','db_name'=>'database'])),
            $cont->updateTable(new Request(['id'=>5, 'fields'=>['user_id'=>1,'name'=>'controller','db_name'=>'changed']])),
            $cont->createColumn(new Request(['table_id'=>5,'field'=>'controller','header'=>'database'])),
            $cont->updateColumn(new Request(['id'=>5, 'fields'=>['table_id'=>5,'field'=>'controller','header'=>'changed']])),*/
        );
    }
}
