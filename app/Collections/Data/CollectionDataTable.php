<?php

namespace App\Collections\Data;

use App\Collections\DtoCollection;
use App\Factories\RepositoryFactory;

class CollectionDataTable extends DtoCollection
{
    /**
     *
     */
    public function loadTaskManagement(): void
    {
        $columns = RepositoryFactory::instance()->dataTableItem()->getbyTableId($this->pluck($this->items, 'id'));
        $this->hasMany($this->items, 'columns', $columns, 'table_id', 'id');
    }
}
