<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class staffCanAccessToStaffRoutesTest extends TestCase
{
    use DatabaseTransactions,WithoutMiddleware;

    //GETs methods

    public function testStaffCanAccessToStaffIndex()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('staff.index'));
        $response->assertStatus(200);

    }


    public function testStaffCanAccessToInProgressTasks()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('staff.tasks-in-progress'));
        $response->assertStatus(200);

    }


    public function testStaffCanAccessToCompletedTasks()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('staff.tasks-completed'));
        $response->assertStatus(200);

    }

    //POSTs mehotds


}
