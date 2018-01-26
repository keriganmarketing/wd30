<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateFeaturedPropertiesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_featured_property_can_be_created()
    {
        $fp = make('App\FeaturedProperty')->toArray();

        $this->post('/featuredproperties', $fp)->assertSuccessful();
        $this->assertDatabaseHas('featured_properties', $fp);
    }

    /** @test */
    public function a_featured_property_can_be_deleted()
    {
        $fp = create('App\FeaturedProperty');

        $this->delete($fp->path())->assertSuccessful();

        $this->assertDatabaseMissing('featured_properties', $fp->toArray());
    }
}
