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


        // foreach ($permissions as $permission) {
        //     Permission::create(['name'=>$permission]);
        // }

        $adminRole = Role::findByName('admin');


        foreach (PermissionSeeder::$permissions as $type=>$permissionsByType) {
            if ($type === 'admin' or $type === 'common') {
                foreach ($permissionsByType as $permission) {
                    $adminRole->givePermissionTo($permission);
                }
            }
        }
    }

}
