<?php

namespace App\Entities;

use App\Relations\Relations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class Entity extends DataTransferObject
{
    use Relations;

    /**
     * @param array $array
     * @return array
     */
    protected function parseArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if ($value instanceof Model) {
                $array[$key] = $value->toArray();
            }

            if ($value instanceof Carbon) {
                $array[$key] = $value->toDateTimeString();
            }
        }

        return parent::parseArray($array);
    }

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
