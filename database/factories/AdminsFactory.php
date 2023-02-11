<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => 'Admin',
            'middle_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'Admin',
            'email' => 'svnhs.shs.board@gmail.com',
            'password' => '$2y$10$AAlay30fG57Kz9MY8wT3muzAEvlUOZVc1.xs3yIPmcM/BREEwuT5m', // arcee0302admin
            // 'remember_token' => Str::random(10),
            // 'email_verified_at' => now(),
        ];
    }
}
