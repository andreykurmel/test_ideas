<?php

namespace App\Factories;

use App\Relations\TableColumnRelations;
use App\Relations\TableRelations;

class RelationFactory
{
    /**
     * @return $this
     */
    public static function instance(): RelationFactory
    {
        return new static();
    }

    /**
     * @return TableRelations
     */
    public function table(): TableRelations
    {
        return app(TableRelations::class);
    }

    /**
     * @return TableColumnRelations
     */
    public function tableColumn(): TableColumnRelations
    {
        return app(TableColumnRelations::class);
    }
}
