<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{
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
        $response = $this->get('/example-route');

        // Assert: Make assertions about the response
        $response->assertStatus(200);
        $response->assertSee('Example Page Content');
    }
}
