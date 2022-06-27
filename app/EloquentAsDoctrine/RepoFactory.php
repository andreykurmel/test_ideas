<?php

namespace App\EloquentAsDoctrine;

use App\EloquentAsDoctrine\Repositories\FieldBaseRepository;
use App\EloquentAsDoctrine\Repositories\FieldRepository;
use App\EloquentAsDoctrine\Repositories\TableBaseRepository;
use App\EloquentAsDoctrine\Repositories\TableRepository;

class RepoFactory
{
    /**
     * @return TableRepository
     */
    public static function tables(): TableRepository
    {
        return new TableBaseRepository();
    }

    /**
     * @return FieldRepository
     */
    public static function fields(): FieldRepository
    {
        return new FieldBaseRepository();
    }
}
