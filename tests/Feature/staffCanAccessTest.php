<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class checkStaffAccessTest extends TestCase
{
    use DatabaseTransactions;


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

}
