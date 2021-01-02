<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class staffCanNotAccessToAdminRoutesTest extends TestCase
{
    use DatabaseTransactions;


    public function testStaffCanNotAccessToAdminIndex()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.index'));
        $isForbidden = $response->isForbidden();
        $this->assertTrue($isForbidden);

    }

    public function testStaffCanNotAccessToAdminShowAllUsers()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-all-users'));
        $isForbidden = $response->isForbidden();
        $this->assertTrue($isForbidden);

    }

    public function testStaffCanNotAccessToAdminShowVerifiedUsers()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-verified-users'));
        $isForbidden = $response->isForbidden();
        $this->assertTrue($isForbidden);

    }

    public function testStaffCanNotAccessToAdminShowUnverifiedUsers()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $response = $this->get(route('admin.show-unverified-users'));
        $isForbidden = $response->isForbidden();
        $this->assertTrue($isForbidden);

    }

}
