<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthenticationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test */
    public function it_asserts_that_employer_can_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Sign-In')
                    ->type('email','amymccarty@gmail.com')
                    ->type('password', 'abcd1234')
                    ->press('LOGIN')
//                    ->assertUrlIs('http://localhost/timeTracker/public/dashboard')
                    ->assertSee('You are logged in as employer')
                    ->assertAuthenticated();
        });
    }

//    public function it_asserts_that_employee_can_login()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->quit();
//            $browser->visit('/login')
//                ->assertSee('Sign-In')
//                ->type('email','test_employee1@email.com')
//                ->type('password', 'abcd1234')
//                ->press('LOGIN')
//                ->assertUrlIs('http://localhost/timeTracker/public/dashboard')
//                ->assertSee('You are logged in as employer')
//                ->assertAuthenticated();
//        });
//    }
}
