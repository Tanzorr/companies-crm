<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // Arrange: Setup the test scenario
        // For example, you might want to create a user in the database.

        // Act: Perform the action you're testing
        $this->withoutMiddleware();
        $response = $this->get('/example-route');

        // Assert: Make assertions about the response
        $response->assertStatus(200);
        $response->assertSee('Example Page Content');
    }

}
