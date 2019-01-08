<?php

namespace Tests\Feature;

use App\Blog;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WriteBlogTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = create(User::class);
    }

    /** @test */
    public function an_unauthenticated_user_cannot_create_a_blog()
    {
        $blog = make(Blog::class);

        $this->post('/blog', $blog->toArray());

        $this->assertDatabaseMissing('blogs', ['id' => $blog->id]);
    }

    /** @test */
    public function an_authenticated_user_can_create_a_blog()
    {
        $blog = $this->postBlog();

        Storage::disk('public')->assertExists($blog->featured_photo_path);
        $this->assertDatabaseHas('blogs', ['title' => $blog['title']]);
    }

    /** @test */
    public function an_unauthenticated_user_cannot_update_a_blog()
    {

        $blog = $this->createBlog();
        $updated = make(Blog::class);

        $this->patch("/blog/{$blog->id}", $updated->toArray());

        Storage::disk('public')->assertExists($blog->featured_photo_path);
        $this->assertDatabaseMissing('blogs', $updated->toArray());
    }

    /** @test */
    public function an_authenticated_user_can_update_a_blog()
    {
        $blog = $this->createBlog();
        $updated = $this->makeBlog();

        $response = $this->patch("/blog/{$blog->id}", $updated);

        $this->assertDatabaseHas('blogs', ['title' => $updated['title']]);
    }


    /** @test */
    public function an_authenticated_user_can_delete_a_blog()
    {
        $this->signIn($this->user);
        $blog = $this->createBlog();
        Storage::disk('public')->assertExists($blog->featured_photo_path);

        
        $this->delete("/blog/{$blog->id}");

        $this->assertDatabaseMissing('blogs', ['title' => $blog->title]);
        Storage::disk('public')->assertMissing($blog->featured_photo_path);
    }

    /** @test */
    public function a_title_is_required()
    {
        $blog = make(Blog::class, [
            'title' => '',
        ])->toArray();

        $this->post('/blog', $blog)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_body_is_required()
    {
        $blog = make(Blog::class, [
            'body' => '',
        ])->toArray();

        $this->post('/blog', $blog)->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_blog_must_have_an_image_file_associated_with_it()
    {
        $blog = make(Blog::class, [
            'file' => ''
        ]);
        $this->post('/blog', $blog->toArray())->assertSessionHasErrors('file');
    }

    public function createBlog()
    {
        $this->signIn($this->user);
        $image = UploadedFile::fake()->image('featured_photo.jpg');
        $blog = new Blog();

        $blog->title = 'Title';
        $blog->body = 'Body';
        $blog->featured_photo_path = Storage::put('blog_photos', $image);
        $blog->save();

        return $blog;
    }

    public function makeBlog()
    {

        return $blog = make(Blog::class)->toArray();
    }

    public function postBlog()
    {
        $this->signIn($this->user);
        $blog = make(Blog::class)->toArray();
    
        $this->post('/blog', $blog);

        return Blog::first();
        
    }
}
