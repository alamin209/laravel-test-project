<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test  */
    use RefreshDatabase;

    public function a_user_can_browse_company()
    {
        $user= \App\Models\User::factory()->create();
        $this->actingAs($user);

        $this->withExceptionHandling();
        $company = \App\Models\Company::factory()->create();
        $response = $this->get('/companies');
        $response->assertSee($company->name);
    }


      /** @test  */
    public function test_a_user_can_read_a_single_company() {

        $user= \App\Models\User::factory()->create();
        $this->actingAs($user);

        $this->withExceptionHandling();
        $company = \App\Models\Company::factory()->create();
        $response = $this->get('companies/'. $company->id);
        $response->assertSee($company->name);
	}

     /** @test */
     public function a_company_can_be_added_to_the_laravel_test()
     {

        $this->withoutExceptionHandling();
        $user= \App\Models\User::factory()->create();
         $this->actingAs($user);

        $response = $this->post('companies', [
            'name' => 'Test',
            'email' => 'Test@gmail.com',
            'website' => 'http://sadfsdas.com'
        ]);
        $response->assertStatus(302);
        $this->assertFalse(count(Company::all()) > 1);

     }


}
