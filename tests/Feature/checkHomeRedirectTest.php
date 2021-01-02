<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class checkHomeRedirectTest extends TestCase
{
    use DatabaseTransactions;


    //GETs methods

    public function testAdminMustRedirectToAdminIndexRoute()
    {
        $user = User::factory()->create();
        $user->assignRole('admin');

        Auth::login($user);

        $this->get('/home')->assertRedirect(route('admin.index'));
    }

    public function testStaffMustRedirectToStaffIndexRoute()
    {
        $user = User::factory()->create();
        $user->assignRole('staff');

        Auth::login($user);

        $this->get('/home')->assertRedirect(route('staff.index'));
    }
}
