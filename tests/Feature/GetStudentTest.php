<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetStudentTest extends TestCase
{
    
    public function testEndpoint()
    {
        $this->json('GET', 'api/students/32132')->assertStatus(404);
    }
}
