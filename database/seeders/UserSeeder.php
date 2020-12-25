<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name'=>'jose',
            'first_surname'=>'apellido 1',
            'second_surname'=>'apellido 2',
            'username'=>'jose username',
            'email'=>'jose@gmail.com',
            'password'=>bcrypt('josejose')
        ]);
    }
}
