<?php

namespace App\Collections;

use App\Entities\Entity;
use Illuminate\Support\Collection;

class DtoCollection extends Collection
{
    /**
     * @var string
     */
    protected $entity = Entity::class;

}
