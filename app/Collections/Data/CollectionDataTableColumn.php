<?php

namespace App\Collections\Data;

use App\Collections\DtoCollection;
use App\Entities\Data\DataTableColumn;
use App\Factories\RepositoryFactory;

class CollectionDataTableColumn extends DtoCollection
{
    protected $entity = DataTableColumn::class;
    /**
     *
     */
    public function loadDropdown(): void
    {
        RepositoryFactory::instance()
            ->dropdown()
            ->relatedDropdowns($this);
    }
}
