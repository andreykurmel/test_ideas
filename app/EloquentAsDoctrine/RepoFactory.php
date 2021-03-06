<?php

namespace App\EloquentAsDoctrine;

use App\EloquentAsDoctrine\Repositories\DropdownBaseRepository;
use App\EloquentAsDoctrine\Repositories\DropdownRepository;
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

    /**
     * @return DropdownRepository
     */
    public static function dropdowns(): DropdownRepository
    {
        return new DropdownBaseRepository();
    }
}
