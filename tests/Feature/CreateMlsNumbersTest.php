<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMlsNumbersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_mls_number_can_be_added_to_a_realtor()
    {
        $user = create('App\User');
        $mls  = factory('App\MlsNumber')->make([
            'user_id' => $user->id,
        ]);

        $this->post('/mls-numbers', [
            'user_id' => $mls->user_id,
            'mls_id' => $mls->mls_id
        ])
        ->assertSuccessful()
        ->assertJsonFragment([
            'user_id' => $mls->user_id,
            'mls_id' => $mls->mls_id
        ]);
    }

    /** @test */
    public function a_blank_mls_number_cannot_be_added_to_a_realtor()
    {
        $user = create('App\User');
        $mls = [
            'user_id' => $user->id,
            'mls_id' => ''
        ];

        $this->post('/mls-numbers', $mls)
            ->assertSessionHasErrors('mls_id');
    }

    /** @test */
    public function a_user_id_is_required_to_add_an_mls_number()
    {
        $mls = [
            'user_id' => '',
            'mls_id' => 'B1234'
        ];

        $this->post('/mls-numbers', $mls)
            ->assertSessionHasErrors('user_id');
    }
}
