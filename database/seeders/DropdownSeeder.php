<?php

namespace Database\Seeders;

use App\Models\Datas\DataTableModel;
use App\Models\Datas\DataTableColumnModel;
use App\Models\Dropdowns\DropdownModel;
use App\Models\Dropdowns\DropdownItemModel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DropdownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DropdownModel::count()) {
            $admin = User::where('role', '=', 'admin')->first();
            $user = User::where('role', '=', 'user')->first();
            $names = [
                ['user_id' => $admin->id, 'name' => 'DDL Used'],
                ['user_id' => $admin->id, 'name' => 'Second'],
                ['user_id' => $admin->id, 'name' => 'Thirth'],
                ['user_id' => $user->id, 'name' => 'My DDL'],
                ['user_id' => $user->id, 'name' => 'Additional'],
            ];
            $items = [
                ['value'=>'one', 'show'=>'Element'],
                ['value'=>'two', 'show'=>'User'],
                ['value'=>'3', 'show'=>'Data'],
                ['value'=>'4', 'show'=>'Some'],
            ];

            foreach ($names as $n) {
                $drop = DropdownModel::create($n);

                foreach ($items as $i) {
                    DropdownItemModel::create( array_merge($i, [
                        'ddl_id' => $drop->id,
                    ]) );
                }
            }

        }
    }
}
