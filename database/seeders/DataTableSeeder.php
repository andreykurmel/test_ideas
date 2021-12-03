<?php

namespace Database\Seeders;

use App\Models\Datas\DataTable;
use App\Models\Datas\DataTableColumn;
use App\Models\Dropdowns\Dropdown;
use App\Models\User;
use Illuminate\Database\Seeder;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DataTable::count()) {
            $admin = User::where('role', '=', 'admin')->first();
            $user = User::where('role', '=', 'user')->first();
            $names = [
                ['user_id' => $admin->id, 'name' => 'STO', 'db_name' => 'sto_12345'],
                ['user_id' => $admin->id, 'name' => 'STOItems', 'db_name' => 'sto_items_09563'],
                ['user_id' => $admin->id, 'name' => 'Tracker', 'db_name' => 'tracker_762834'],
                ['user_id' => $user->id, 'name' => 'Geometry', 'db_name' => 'geom_73481'],
                ['user_id' => $user->id, 'name' => 'Structure', 'db_name' => 'structure_879234'],
            ];
            $ddl = Dropdown::where('user_id', '=', $admin->id)->first();
            $items = [
                ['field'=>'str', 'header'=>'String', 'default'=>''],
                ['field'=>'int', 'header'=>'Integer', 'default'=>'0'],
                ['field'=>'float', 'header'=>'Float', 'default'=>'15.32'],
            ];

            foreach ($names as $n) {
                $table = DataTable::create($n);

                foreach ($items as $i) {
                    DataTableColumn::create( array_merge($i, [
                        'table_id' => $table->id,
                        'ddl_id' => ($n['user_id'] == $admin->id && $i['field']=='str' ? $ddl->id : null),
                    ]) );
                }
            }

        }
    }
}
