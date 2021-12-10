<?php

namespace App\Entities;

use Spatie\DataTransferObject\DataTransferObject;

class Entity extends DataTransferObject
{
    /**
     * @param string ...$keys
     * @return $this
     */
    public function only(string ...$keys): static
    {
        $this->onlyKeys = [...$this->onlyKeys, ...$keys];
        return $this;
    }

    /**
     * @param string ...$keys
     * @return $this
     */
    public function except(string ...$keys): static
    {
        $this->exceptKeys = [...$this->exceptKeys, ...$keys];
        return $this;
    }
}
