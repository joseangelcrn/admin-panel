<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Aqui si usaré fake porque me da igual, en un principio, el valor que tengan los tasks

        Task::factory()->count(10)->create();
        //no se los asigno a nadie
    }
}

