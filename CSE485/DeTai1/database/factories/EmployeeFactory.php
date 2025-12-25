<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name_employee' => $this->faker->name(),
            'email_employee' => $this->faker->unique()->safeEmail(),
            'position_employee' => $this->faker->jobTitle(),
            'phone_employee' => $this->faker->phoneNumber(),
            'salary_employee' => $this->faker->numberBetween(30000, 100000),
        ];
    }
}
