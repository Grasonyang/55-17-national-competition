<?php

namespace Database\Factories;

use App\Models\task_type_output;
use App\Models\task_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task_type_output>
 */
class task_type_outputFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = task_type_output::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_type_id' => task_type::factory(),
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['string', 'number', 'boolean']),
        ];
    }

    /**
     * Create a string type output definition.
     */
    public function string(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'string',
        ]);
    }

    /**
     * Create a number type output definition.
     */
    public function number(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'number',
        ]);
    }

    /**
     * Create a boolean type output definition.
     */
    public function boolean(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'boolean',
        ]);
    }
}
