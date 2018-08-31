<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStudentTest extends TestCase
{
    
    public function testEmptyName()
    {
        $input = [
        "name" => "",
        "email" => "miguel@alfasoft.pt",
        "phone_number" => "918341661"
        ];
        
        $this->json('POST', 'api/students', $input)
        ->assertStatus(400)
        ->assertJson(["name"=>["The name field is required."]]);
    }
    
    public function testEmptyEmail()
    {
        $input = [
        "name" => "Miguel Alfaiate",
        "email" => "",
        "phone_number" => "918341661"
        ];
        
        $this->json('POST', 'api/students', $input)
        ->assertStatus(400)
        ->assertJson(["email"=>["The email field is required."]]);
    }
    
    public function testEmptyPhoneNumber()
    {
        $input = [
        "name" => "Miguel Alfaiate",
        "email" => "miguelljaskldasd@alfasoft.pt",
        "phone_number" => ""
        ];
        
        $this->json('POST', 'api/students', $input)
        ->assertStatus(400)
        ->assertJson(["phone_number"=>["The phone number field is required."]]);
    }
    
    public function testInvalidPhoneNumber()
    {
        $input = [
        "name" => "Miguel Alfaiate",
        "email" => "miguelljaskldasd@alfasoft.pt",
        "phone_number" => "asdasdasdasd"
        ];
        
        $this->json('POST', 'api/students', $input)
        ->assertStatus(400)
        ->assertJson(["phone_number"=>["The phone number must be an integer."]]);
    }
}
