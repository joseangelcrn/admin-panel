<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([

            //Creation of roles and permissions
            RoleSeeder::class,
            // PermissionSeeder::class,

            //Assign  Role permissions
            AdminPermissions::class,
            StaffPermissions::class,

            //Creation of 'seeders'
            AdminSeeder::class,
            StaffSeeder::class,
            TasksSeeders::class
        ]);
    }
}

