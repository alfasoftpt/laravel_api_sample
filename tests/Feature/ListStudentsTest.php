<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListStudentsTest extends TestCase
{
    
    public function testEndpoint()
    {
        $this->json('GET', 'api/students')->assertStatus(200);
    }
}
