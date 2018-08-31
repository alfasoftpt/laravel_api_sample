<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit('/login')
             ->see('Login')
             ->see('E-Mail Address');
    }
    
    public function testInvalidLogin() {
    	$this->visit('/login')
         ->type('tests@alfasoft.pt', 'email')
         ->type('password', 'password')
         ->press('Login')
         ->see('These credentials do not match.');
    }
    
    public function testEmptyUsername() {
    	$this->visit('/login')
         ->type('password', 'password')
         ->press('Login')
         ->see('The email field is required.');
    }
    
    public function testEmptyPassword() {
    	$this->visit('/login')
         ->type('tests@alfasoft.pt', 'email')
         ->press('Login')
         ->see('The password field is required.');
    }
}