<?php

namespace App\Repositories\Data;

use App\Entities\Data\DataTable;
use Illuminate\Support\Collection;

interface DataTableRepository
{
    /**
     * //return Collection<DataTable> - not working in 'foreach'
     * @return Collection|DataTable[]
     */
    public function all(): iterable;
}
