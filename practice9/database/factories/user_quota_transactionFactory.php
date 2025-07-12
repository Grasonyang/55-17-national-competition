<?php

namespace Database\Factories;

use App\Models\user_quota_transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user_quota_transaction>
 */
class user_quota_transactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = user_quota_transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reason = $this->faker->randomElement(['CREATE_USER', 'RECHARGE', 'CONSUME']);
        
        $value = match($reason) {
            'CREATE_USER' => $this->faker->numberBetween(10, 50),
            'RECHARGE' => $this->faker->numberBetween(50, 500),
            'CONSUME' => -$this->faker->numberBetween(1, 100),
        };

        return [
            'user_id' => User::factory(),
            'value' => $value,
            'reason' => $reason,
        ];
    }

    /**
     * Create a user creation transaction.
     */
    public function createUser(): static
    {
        return $this->state(fn (array $attributes) => [
            'value' => $this->faker->numberBetween(10, 50),
            'reason' => 'CREATE_USER',
        ]);
    }

    /**
     * Create a recharge transaction.
     */
    public function recharge(): static
    {
        return $this->state(fn (array $attributes) => [
            'value' => $this->faker->numberBetween(50, 500),
            'reason' => 'RECHARGE',
        ]);
    }

    /**
     * Create a consume transaction.
     */
    public function consume(): static
    {
        return $this->state(fn (array $attributes) => [
            'value' => -$this->faker->numberBetween(1, 100),
            'reason' => 'CONSUME',
        ]);
    }
}
