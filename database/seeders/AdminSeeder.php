<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $adminUser = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'first_surname'=>'surname 1',
            'second_surname'=>'surname 2',
            'user_name'=>'admin username',
            'password'=>bcrypt('adminpassword')
        ]);


        $adminRole = Role::findByName('admin');

        $adminUser->assignRole($adminRole->id);
    }
}
