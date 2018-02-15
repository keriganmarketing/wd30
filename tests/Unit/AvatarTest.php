<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AvatarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_avatar_belongs_to_a_user()
    {
        $user = create('App\User');
        $avatar = create('App\Avatar', [
            'user_id' => $user->id
        ]);

        self::assertInstanceOf('App\User', $avatar->realtor);
    }
}
