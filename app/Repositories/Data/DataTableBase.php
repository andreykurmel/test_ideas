<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Models\Datas\DataTableModel;
use Illuminate\Support\Collection;

class DataTableBase implements DataTableRepository
{

    /**
     * @inheritdoc
     */
    public function all(): iterable
    {
        return DataTableModel::all()->map(function (DataTableModel $item) {
            return new DataTable($item->toArray());
        });
    }
}
