<?php

namespace App\Repositories\Dropdowns;

use App\Entities\Data\DataTableColumn;
use App\Entities\Dropdowns\Dropdown;

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
     * @param array $ids
     * @return Dropdown[]
     */
    public function get(array $ids): array;
}
