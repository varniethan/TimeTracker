<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test */
    public function it_asserts_that_employer_can_register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Sign-Up')
                ->type('first_name','TEST FIRST')
                ->type('last_name','TEST SECOND')
                ->type('dob','01/01/1978')
                ->select('gender','1')
                ->press('NEXT')
                ->type('mobile_number','07524138454')
                ->type('land_number','9175485683154')
                ->type('email','TEST@email.com')
                ->type('postal_code','TESTPC')
                ->type('address_1','55, Test Road')
                ->type('address_2','Test Land')
                ->select('country','232')
                ->pause(1000)
                ->select('city')
                ->screenshot('register')
                ->press('NEXT')
                ->type('ni_number','RJ345J')
                ->type('basic_salary','5000')
                ->press('NEXT')
                ->type('user_name','TEST_TT')
                ->type('password','abcd1234')
                ->type('password_confirmation', 'abcd1234')
                ->press('SUBMIT')
                ->assertSee('Sign-In');
        });
    }
}
