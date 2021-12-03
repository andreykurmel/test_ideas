<?php

namespace App\Http\Controllers;

use App\Factories\RepositoryFactory;
use App\Models\Datas\DataTableModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $tables = RepositoryFactory::dataTable()->all();
        dd($tables->first(), RepositoryFactory::dataTableItem()->forParent($tables->first()));
    }
}
