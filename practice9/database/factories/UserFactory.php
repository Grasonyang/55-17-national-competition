<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password_hash' => bcrypt('password'),
            'nickname' => $this->faker->userName,
            'profile_image' => null,
            'type' => $this->faker->randomElement(['ADMIN','USER']),
            'access_token' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user is logged in with an access token.
     *
     * @return $this
     */
    public function loggedIn(): static
    {
        return $this->state(fn (array $attributes) => [
            'access_token' => Str::random(32),
        ]);
    }
}
