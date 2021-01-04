<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class staffCanNotAccessToAdminRoutesTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp():void
    {
        parent::setUp();
        $this->withoutMiddleware('verify');

    }


    //GETs methods

    public function testStaffCanNotAccessToAdminIndex()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.index'));
        $response->assertRedirect(route('forbidden'));
    }


    public function testStaffCanNotAccessToAdminShowAllUsers()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-all-users'));
        $response->assertRedirect(route('forbidden'));

    }

    public function testStaffCanNotAccessToAdminShowVerifiedUsers()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-verified-users'));
        $response->assertRedirect(route('forbidden'));

    }

    public function testStaffCanNotAccessToAdminShowUnverifiedUsers()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-unverified-users'));
        $response->assertRedirect(route('forbidden'));

    }

    public function testStaffCanNotAccessToAdminShowUsersWithTasks()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-users-with-tasks'));
        $response->assertRedirect(route('forbidden'));

    }


    public function testStaffCanNotAccessToAdminShowUsersWithoutTasks()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-users-without-tasks'));
        $response->assertRedirect(route('forbidden'));

    }

    public function testStaffCanNotAccessToAdminShowUserById()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        $userToShow = User::factory()->create();
        $userToShow->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-user',$userToShow->id));
        $response->assertRedirect(route('forbidden'));

    }

    public function testStaffCanNotAccessToAdminEditUser()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        $userToEdit = User::factory()->create();
        $userToEdit->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.edit-user',$userToEdit->id));
        $response->assertRedirect(route('forbidden'));

    }


    //POSTs methods


    public function testStaffCanNotAccessToAdminUpdateUser()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        $userToUpdate = User::factory()->create();
        $userToUpdate->assignRole('staff');

        $userToUpdate->user_name .= ' edited';


        Auth::login($user);

        $response = $this->post(route('admin.update-user',$userToUpdate->id));
        $response->assertRedirect(route('forbidden'));

    }
}
