<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use App\Avatar;

class AvatarUploadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_realtor_can_upload_an_avatar()
    {
        create('App\User');

        Storage::fake('public');

        $response = $this->json('POST', '/avatar', [
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $response->assertSuccessful();

        $avatar = Avatar::first();

        self::assertEquals($avatar->path, $response->getContent());
        // Assert the file was stored...
        Storage::disk('public')->assertExists($response->getContent());
    }

    /** @test */
    public function an_uploaded_avatar_is_persisted_to_the_database()
    {
        create('App\User');

        Storage::fake('public');

        $response = $this->json('POST', '/avatar', [
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $avatar = Avatar::first();

        self::assertEquals($response->getContent(), $avatar->path);
    }
}
