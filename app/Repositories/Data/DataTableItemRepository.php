<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use App\Entities\Data\DataTableColumn;
use Illuminate\Support\Collection;

interface DataTableItemRepository
{
    /**
     * @return Collection|DataTableColumn[]
     */
    public function forParent(DataTable $dataTable): iterable;
}
