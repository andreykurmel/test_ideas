<?php

namespace App\Collections\Data;

use App\Collections\DtoCollection;
use App\Entities\Data\DataTable;
use App\Factories\RepositoryFactory;

class CollectionDataTable extends DtoCollection
{
    /**
     * @var string
     */
    protected $entity = DataTable::class;

    /**
     *
     */
    public function loadColumns(): void
    {
        RepositoryFactory::instance()
            ->dataTableItem()
            ->relationColumns($this);
    }
}
