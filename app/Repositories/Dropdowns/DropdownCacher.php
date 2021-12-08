<?php

namespace App\Repositories\Dropdowns;

use App\Entities\Dropdowns\Dropdown;
use Illuminate\Support\Facades\Cache;

class DropdownCacher extends DropdownLogger
{
    /**
     * @inheritdoc
     */
    public function create(Dropdown $dropdown): Dropdown
    {
        Cache::forget('data_tables_all');
        return parent::create($dropdown);
    }

    /**
     * @inheritdoc
     */
    public function update(Dropdown $dropdown): Dropdown
    {
        Cache::forget('data_tables_all');
        return parent::update($dropdown);
    }

}
