<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StaffPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $permissions = [
            'staff-index'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }

        $staffRole = Role::findByName('staff');
        $staffRole->syncPermissions($permissions);
    }
}
