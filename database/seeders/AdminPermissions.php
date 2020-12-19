<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminPermissions extends Seeder
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
            'admin-index',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }

        $adminRole = Role::findByName('admin');

        $adminRole->syncPermissions($permissions);
    }

}
