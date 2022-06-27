<?php

namespace App\EloquentAsDoctrine\Repositories;

use App\EloquentAsDoctrine\Collections\TableCollection;
use App\EloquentAsDoctrine\Models\TableModel;
use Illuminate\Database\Eloquent\Builder;

class TableBaseRepository extends CoreRepository implements TableRepository
{
    protected $model = TableModel::class;

    /**
     * @return TableCollection
     */
    public function all(): TableCollection
    {
        $rows = $this->query()->get();
        return new TableCollection($rows);
    }

    /**
     * @return Builder
     */
    protected function query(): Builder
    {
        return TableModel::query();
    }

    /**
     * @param string $field
     * @param mixed|null $value
     * @param string $operator
     * @return TableCollection
     */
    public function getBy(string $field, mixed $value = null, string $operator = '='): TableCollection
    {
        $rows = $this->query()->where($field, $operator, $value)->get();
        return new TableCollection($rows);
    }
}
