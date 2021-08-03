<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CompanyCreate extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateCompany(){

            $company = \App\Models\Company::factory()->make([
                'name' => 'test',
                'email' => 'test@gmail.com',
                'website' => 'http://sadfsdas.com'
            ]);

            $this->assertEquals('test', $company->name);
            $this->assertEquals('test@gmail.com', $company->email);
            $this->assertEquals('http://sadfsdas.com', $company->website);


    }
}
