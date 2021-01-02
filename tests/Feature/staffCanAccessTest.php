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
        $isForbidden = $response->isForbidden();
        $this->assertFalse($isForbidden);

    }


    public function testStaffCanAccessToInProgressTasks()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('staff.tasks-in-progress'));
        $isForbidden = $response->isForbidden();
        $this->assertFalse($isForbidden);

    }


    public function testStaffCanAccessToCompletedTasks()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('staff.tasks-completed'));
        $isForbidden = $response->isForbidden();
        $this->assertFalse($isForbidden);

    }

}
