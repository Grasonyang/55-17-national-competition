<?php

namespace Database\Factories;

use App\Models\task;
use App\Models\task_type;
use App\Models\User;
use App\Models\worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class taskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_type_id' => task_type::factory(),
            'user_id' => User::factory(),
            'worker_id' => $this->faker->boolean(70) ? worker::factory() : null,
            'status' => $this->faker->randomElement(['pending', 'processing', 'finished', 'failed', 'canceled']),
        ];
    }

    /**
     * Indicate that the task is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'worker_id' => null,
        ]);
    }

    /**
     * Indicate that the task is processing.
     */
    public function processing(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'processing',
            'worker_id' => worker::factory(),
        ]);
    }

    /**
     * Indicate that the task is finished.
     */
    public function finished(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'finished',
            'worker_id' => worker::factory(),
        ]);
    }
}
