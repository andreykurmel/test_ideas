<?php

namespace App\Repositories\Dropdowns;

use App\Collections\Data\CollectionDataTableColumn;
use App\Collections\Dropdowns\CollectionDropdown;
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
     * @param array $ids
     * @return CollectionDropdown
     */
    public function get(array $ids): CollectionDropdown;

    /**
     * @param CollectionDataTableColumn $collection
     * @return CollectionDataTableColumn
     */
    public function relatedDropdowns(CollectionDataTableColumn $collection): CollectionDataTableColumn;
}
