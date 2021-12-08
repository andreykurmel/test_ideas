<?php

namespace App\Repositories\Dropdowns;

use App\Entities\Dropdowns\Dropdown;
use Illuminate\Support\Facades\Log;

class DropdownLogger extends DropdownBase
{
    /**
     * @inheritdoc
     */
    public function create(Dropdown $dropdown): Dropdown
    {
        Log::info('dropdown created');
        return parent::create($dropdown);
    }

    /**
     * @inheritdoc
     */
    public function update(Dropdown $dropdown): Dropdown
    {
        Log::info('dropdown updated');
        return parent::update($dropdown);
    }

}
