<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->withoutMiddleware();
        $this->assertTrue(true);
    }
}
