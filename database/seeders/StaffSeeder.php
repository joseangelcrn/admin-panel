<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $staffUser = User::create([
            'name'=>'staff',
            'email'=>'staff@gmail.com',
            'password'=>bcrypt('staffpassword')
        ]);

        $staffRole = Role::findByName('staff');

        $staffUser->assignRole($staffRole->id);
    }
}


