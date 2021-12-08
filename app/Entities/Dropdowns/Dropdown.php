<?php

namespace App\Entities\Dropdowns;

class Dropdown extends \App\Entities\Entity
{
    protected array $onlyKeys = ['id', 'name'];

    public ?int $id;
    public int $user_id;
    public string $name;
    public string $order = 'asc';
}
