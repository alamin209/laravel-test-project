<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CompanyTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */




      /** @test */
    public function can_view_index_company()
    {
        $company = \App\Models\Company::factory()->create();
        $this->user = \App\Models\User::factory()->create();

        $this->browse(function (Browser $browser) use ($company) {
            $user = $this->user;
            $browser->loginAs($user)
                    ->visit('/companies')
                    ->assertSee($company->name)
                    ->assertSee($company->email)
                    ->assertSee($company->website);
        });
    }
}
