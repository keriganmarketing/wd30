<?php

namespace Tests\Feature;

use App\Avatar;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AvatarUploadTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }

    /** @test */
    public function a_realtor_can_upload_an_avatar()
    {
        $file = $this->uploadPhoto();

        $this->assertEquals('avatar/' . $file->hashName(), $this->user->avatar_path);
        Storage::disk('public')->assertExists('avatar/' . $file->hashName());
    }

    /** @test */
    public function it_deletes_the_old_avatar_when_a_new_one_is_uploaded()
    {
        //upload original photo
        $firstFile = $this->uploadPhoto();
        self::assertEquals(1, count(Storage::disk('public')->files('avatar')));
        $this->assertDatabaseHas(
            'users',
            ['avatar_path' => 'avatar/'. $firstFile->hashName()]
        );

        //upload a new photo
        $newFile = $this->uploadPhoto();
        self::assertEquals(1, count(Storage::disk('public')->files('avatar')));
        $this->assertDatabaseHas(
            'users',
            ['avatar_path' => 'avatar/'. $newFile->hashName()]);
        $this->assertDatabaseMissing(
            'users',
            ['avatar_path' => 'avatar/'. $firstFile->hashName()]
        );

    }
    protected function uploadPhoto()
    {
        $this->signIn($this->user);

        Storage::fake('public');

        $this->json('POST', '/avatar', [
            'avatar' => $file = UploadedFile::fake()->image('avatar.jpg')
        ]);

        return $file;
    }
}
