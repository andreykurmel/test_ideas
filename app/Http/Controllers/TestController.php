<?php

namespace App\Http\Controllers;

use App\EloquentAsDoctrine\Collections\FieldCollection;
use App\EloquentAsDoctrine\RepoFactory;
use App\Models\Datas\DataTableModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        /*$e_tables = DataTableModel::all();
        dd($e_tables->makeHidden(['created_at', 'updated_at'])->toArray());*/

        $tables = RepoFactory::tables()->all();
        $tables->loadFields('id,table_id,field,ddl_id');

        $fields = new FieldCollection($tables->pluck('fields')->flatten());
        $fields->loadDropdown();

        $tables->makeHidden(['created_at', 'updated_at', 'preventsLazyLoading']);
        dd($tables);

        $cont = new GoodController();
        return $cont->allTables(new Request());
        dd(
        //$cont->tableById(new Request(['table_id'=>2])),
            $cont->allTables(new Request()),
        /*$cont->createTable(new Request(['user_id'=>1,'name'=>'controller','db_name'=>'database'])),
        $cont->updateTable(new Request(['id'=>5, 'fields'=>['user_id'=>1,'name'=>'controller','db_name'=>'changed']])),
        $cont->createColumn(new Request(['table_id'=>5,'field'=>'controller','header'=>'database'])),
        $cont->updateColumn(new Request(['id'=>5, 'fields'=>['table_id'=>5,'field'=>'controller','header'=>'changed']])),*/
        );

        $cont = new BadController();
        dd(
            $cont->tableById(new Request(['table_id' => 2])),
            $cont->allTables(new Request()),
        /*$cont->createTable(new Request(['user_id'=>1,'name'=>'controller','db_name'=>'database'])),
        $cont->updateTable(new Request(['id'=>5, 'fields'=>['user_id'=>1,'name'=>'controller','db_name'=>'changed']])),
        $cont->createColumn(new Request(['table_id'=>5,'field'=>'controller','header'=>'database'])),
        $cont->updateColumn(new Request(['id'=>5, 'fields'=>['table_id'=>5,'field'=>'controller','header'=>'changed']])),*/
        );
    }
}
