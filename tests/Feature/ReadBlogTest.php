<?php

namespace Tests\Feature;

use App\Blog;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadBlogTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = create(User::class);
    }
    /** @test */
    public function it_returns_a_list_of_blogs()
    {
        $blog = $this->createBlog();

        $response = $this->get('/blog');

        $response->assertJsonFragment(['id' => $blog->id]);
    }

    /** @test */
    public function it_returns_a_single_blog()
    {
        $blog = $this->createBlog();

        $response = $this->get("/blog/{$blog->id}");

        $response->assertJsonFragment(['title' => $blog->title]);
    }

    public function createBlog()
    {
        $this->signIn($this->user);

        $blog = make(Blog::class)->toArray();
    
        $this->post('/blog', $blog);

        return Blog::first();

    }
}
