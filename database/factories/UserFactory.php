<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'birthdate' => $this->faker->date('Y-m-d', '-18 years'),
            'job' => $this->faker->jobTitle,
            'profile_status' => $this->faker->boolean,
            'picture' => $this->faker->imageUrl(200, 200, 'people', true, 'User Picture'),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
        ];
    }
}
