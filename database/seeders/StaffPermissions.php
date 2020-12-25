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
        $staffRole = Role::findByName('staff');
        $staffRole->syncPermissions(PermissionSeeder::$permissions['staff']);
    }
}
