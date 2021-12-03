<?php

namespace App\Entities\Dropdowns;

class DropdownItem extends \App\Entities\Entity
{
    public int $id;
    public int $ddl_id;
    public string $value;
    public string $show = '';
    public string $image_path = '';
}
