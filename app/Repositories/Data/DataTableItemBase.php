<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use App\Models\Datas\DataTableColumnModel;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class DataTableItemBase implements DataTableItemRepository
{
    /**
     * @param DataTable $dataTable
     * @return iterable
     * @throws UnknownProperties
     */
    public function forParent(DataTable $dataTable): iterable
    {
        return DataTableColumnModel::where('table_id', '=', $dataTable->id)
            ->get()
            ->map(function (DataTableColumnModel $item) {
                return new DataTableColumn($item->toArray());
            });
    }

}
