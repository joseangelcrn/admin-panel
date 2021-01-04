<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class staffCanAccessToTaskRoutesTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp():void
    {
        parent::setUp();
        $this->withoutMiddleware('verify');

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */

    //GETs methods

    public function testStaffCanAccessToShowAssignedTasks()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');


        $task = Task::factory()->create();
        $task->assignUser($user->id);

        Auth::login($user);

        $response = $this->get(route('task.show',$task->id));

        $response->assertStatus(200)->assertSessionDoesntHaveErrors();
    }

    public function testStaffCanNotAccessToShowUnassignedTasks()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');


        $task = Task::factory()->create();

        Auth::login($user);

        $response = $this->get(route('task.show',$task->id));

        $response->assertRedirect(route('forbidden'));
    }

    public function testStaffCanNotAccessToEnabledTasksList()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('task.list-enabled'));

        $response->assertRedirect(route('forbidden'));
    }


    public function testStaffCanNotAccessToDisabledTasksList()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('task.list-disabled'));

        $response->assertRedirect(route('forbidden'));
    }


    public function testStaffCanNotAccessToAssignedTasksList()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('task.list-assigned'));

        $response->assertRedirect(route('forbidden'));
    }


    public function testStaffCanNotAccessToUnassignedTasksList()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('task.list-unassigned'));

        $response->assertRedirect(route('forbidden'));
    }



    public function testStaffCanNotAccessToCompletedAndUnverifiedTasksList()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('task.list-completed-unverified'));

        $response->assertRedirect(route('forbidden'));
    }


    public function testStaffCanNotAccessToIncompletedTasksList()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('task.list-incompleted'));

        $response->assertRedirect(route('forbidden'));
    }

    public function testStaffCanNotAccessToTaskAssignForm()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');

        $userWhoGetAssignedTask = User::factory()->create();

        Auth::login($user);

        $response = $this->get(route('task.assign-form',$userWhoGetAssignedTask->id));

        $response->assertRedirect(route('forbidden'));
    }

    //POSTs methods

    public function testStaffCanAccessToCompleteAssignedTasks()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');


        $task = Task::factory()->create();
        $task->assignUser($user->id);

        Auth::login($user);

        $response = $this->from(route('staff.index'))->post(route('task.complete',[$task->id,$user->id]));

        $response->assertRedirect(route('staff.index'))->assertSessionHas('success');
    }

    public function testStaffCanNotAccessToCompleteUnassignedTasks()
    {

        $user = User::factory()->create();
        $user->assignRole('staff');


        $task = Task::factory()->create();

        Auth::login($user);

        $response = $this->from(route('staff.index'))->post(route('task.complete',[$task->id,$user->id]));

        $response->assertRedirect(route('staff.index'))->assertSessionHas('error');
    }

}
