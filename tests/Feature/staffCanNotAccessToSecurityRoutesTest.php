<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class staffCanNotAccessToSecurityRoutesTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp():void
    {
        parent::setUp();
        $this->withoutMiddleware('verify');

    }

    //GETs methods

    public function testStaffCanNotAccessToSecurityIndex()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.security.index'));
        $response->assertRedirect(route('forbidden'));
    }

    public function testStaffCanNotAccessToSecurityUsersAndRoles()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.security.show.users-and-roles'));
        $response->assertRedirect(route('forbidden'));
    }


    //POSTs methods

    public function testStaffCanNotAccessToSecurityUpdateAllRoles()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->post(route('admin.security.update.users-and-roles'));
        $response->assertRedirect(route('forbidden'));
    }
}
