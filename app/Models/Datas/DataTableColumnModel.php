<?php

namespace App\Models\Datas;

use App\Models\Dropdowns\DropdownModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTableColumnModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'table_id',
        'ddl_id',
        'field',
        'header',
        'default',
    ];

    protected $table = 'data_table_columns';


    public function _drop()
    {
        return $this->hasOne(DropdownModel::class, 'id', 'ddl_id');
    }
}
