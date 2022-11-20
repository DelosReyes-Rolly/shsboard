<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_id' => $this->faker->unique()->numberBetween($min = 31, $max = 130),
            'course_id' => $this->faker->numberBetween($min = 1, $max = 8),
            'section_id' => $this->faker->numberBetween($min = 1, $max = 2),
            'LRN' => $this->faker->numberBetween($min = 1, $max = 1000),
            'first_name' => $this->faker->firstname(),
            'middle_name' => $this->faker->lastname(),
            'last_name' => $this->faker->lastname(),
            'suffix' => $this->faker->suffix(),
            'gradelevel_id' => $this->faker->numberBetween($min = 1, $max = 2),
            'username' => $this->faker->username(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
        ];
    }
}
