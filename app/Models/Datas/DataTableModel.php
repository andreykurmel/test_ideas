<?php

namespace App\Models\Datas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTableModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'db_name',
        'notes',
    ];

    protected $table = 'data_tables';


    public function _columns()
    {
        return $this->hasMany(DataTableColumnModel::class, 'table_id', 'id');
    }
}
