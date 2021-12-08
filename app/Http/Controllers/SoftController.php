<?php

namespace App\Http\Controllers;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Factories\RepositoryFactory;
use App\Factories\ServiceFactory;
use App\Models\Datas\DataTableColumnModel;
use App\Models\Datas\DataTableModel;
use App\Models\Dropdowns\DropdownModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SoftController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function tableById(Request $request)
    {
        return Cache::rememberForever('data_table_'.$request->table_id, function () use ($request) {
            return DataTableModel::where('id', '=', $request->table_id)
                ->with([
                    '_columns' => function ($q) {
                        $q->with('_drop:id,name');
                    }
                ])
                ->first()
                ->toArray();
        });
    }

    /**
     * @param Request $request
     * @return DataTableModel[]|\Illuminate\Database\Eloquent\Collection
     */
    public function allTables(Request $request)
    {
        return Cache::rememberForever('data_tables_all', function () {
            return DataTableModel::withCount('_columns')->get(['id','name']);
        });
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateTable(Request $request)
    {
        Cache::forget('data_table_'.$request->id);
        Cache::forget('data_tables_all');

        Log::info('update table');

        $fils = (new DataTableModel())->getFillable();
        $data = collect($request->all())->only($fils);
        DataTableModel::where('id', '=', $request->id)->update($data->toArray());

        return DataTableModel::where('id', '=', $request->id)->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createTable(Request $request)
    {
        Cache::forget('data_tables_all');

        Log::info('create table');

        return DataTableModel::create($request->all());
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateColumn(Request $request)
    {
        Cache::forget('data_table_'.$request->table_id);
        Cache::forget('data_tables_all');

        Log::info('update column');

        $fils = (new DataTableColumnModel())->getFillable();
        $data = collect($request->all())->only($fils);
        DataTableColumnModel::where('id', '=', $request->id)->update($data->toArray());
        return DataTableColumnModel::where('id', '=', $request->id)->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createColumn(Request $request)
    {
        Cache::forget('data_table_'.$request->table_id);
        Cache::forget('data_tables_all');

        Log::info('create column');

        return DataTableColumnModel::create($request->all());
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateDrop(Request $request)
    {
        Cache::forget('data_tables_all');

        Log::info('update drop');

        $fils = (new DropdownModel())->getFillable();
        $data = collect($request->all())->only($fils);
        DropdownModel::where('id', '=', $request->id)->update($data->toArray());
        return DropdownModel::where('id', '=', $request->id)->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createDrop(Request $request)
    {
        Cache::forget('data_tables_all');

        Log::info('create drop');

        return DropdownModel::create($request->all());
    }
}
