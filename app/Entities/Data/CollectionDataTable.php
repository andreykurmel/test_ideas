<?php

namespace App\Entities\Data;

use App\Factories\RepositoryFactory;

class CollectionDataTable extends \App\Entities\Collection
{
    public function loadItems()
    {
        return RepositoryFactory::dataTableItem()->relatedToTable($this);
    }
}
