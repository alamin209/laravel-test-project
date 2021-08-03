<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $company_id =\App\Models\Company::pluck('id')->toArray();
        return [
            'first_name'           => $this->faker->name,
            'last_name'            => $this->faker->name,
            'company_id'           => $this->faker->randomElement($company_id) ,
            'last_name'            => $this->faker->name,
            'email'                =>  $this->faker->unique()->safeEmail(),
            'phone'                => $this->faker->phoneNumber

        ];

    }
}
