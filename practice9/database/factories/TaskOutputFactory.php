<?php

namespace Database\Factories;

use App\Models\task_output;
use App\Models\task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task_output>
 */
class task_outputFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = task_output::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['string', 'number', 'boolean']);
        
        $value = match($type) {
            'string' => $this->faker->paragraph(),
            'number' => (string) $this->faker->randomFloat(2, 0, 1000),
            'boolean' => $this->faker->boolean() ? 'true' : 'false',
        };

        return [
            'task_id' => task::factory(),
            'name' => $this->faker->word(),
            'type' => $type,
            'value' => $value,
        ];
    }

    /**
     * Create a string type output.
     */
    public function string(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'string',
            'value' => $this->faker->paragraph(),
        ]);
    }

    /**
     * Create a number type output.
     */
    public function number(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'number',
            'value' => (string) $this->faker->randomFloat(2, 0, 1000),
        ]);
    }

    /**
     * Create a boolean type output.
     */
    public function boolean(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'boolean',
            'value' => $this->faker->boolean() ? 'true' : 'false',
        ]);
    }
}
