<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class staffCanAccessToTaskRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //GETs methods



    //POSTs methods

    public function testStaffCanAccessToCompleteAssignedTasks()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');


        $task = Task::factory()->create();
        $task->assignUser($user->id);

        Auth::login($user);

        $response = $this->from(route('staff.index'))->post(route('task.complete',[$task->id,$user->id]));

        $response->assertRedirect(route('staff.index'));
    }
}
