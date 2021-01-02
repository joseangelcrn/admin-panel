<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class staffCanNotAccessToSecurityRoutesTest extends TestCase
{
    /**
     *   Route::prefix('security')->name('security.')->group(function () {
          Route::get('/', [SecurityController::class,'index'])->name('index');
          Route::get('/users-and-roles', [SecurityController::class,'showTableUsersAndRoles'])->name('show.users-and-roles');
          Route::post('/update-all-roles', [SecurityController::class,'updateAllRoles'])->name('update.users-and-roles');
        });
     */
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
}
