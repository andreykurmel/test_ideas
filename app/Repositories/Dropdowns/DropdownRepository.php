<?php

namespace App\Repositories\Dropdowns;

use App\Entities\Data\DataTableColumn;
use App\Entities\Dropdowns\Dropdown;
use Illuminate\Support\Collection;

interface DropdownRepository
{
    /**
     * @param Dropdown $dropdown
     * @return Dropdown
     */
    public function create(Dropdown $dropdown): Dropdown;

    /**
     * @param Dropdown $dropdown
     * @return Dropdown
     */
    public function update(Dropdown $dropdown): Dropdown;

    /**
     * @param int[]|int $ids
     * @return Dropdown[]|Dropdown
     */
    public function get(array|int $ids): array|Dropdown;
}
