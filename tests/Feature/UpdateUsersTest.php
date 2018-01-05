<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_update_their_name()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user);

        $this->json('PATCH', '/users/'. $user->id, [
            'name' => 'Changed Name'
        ]);

        $changedUser = User::find($user->id);

        $this->assertDatabaseHas('users', [
            'name' => 'Changed Name'
        ]);
    }
}
