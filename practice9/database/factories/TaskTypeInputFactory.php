<?php

namespace Database\Factories;

use App\Models\task_type_input;
use App\Models\task_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task_type_input>
 */
class task_type_inputFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = task_type_input::class;

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
     * Create a string type input definition.
     */
    public function string(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'string',
        ]);
    }

    /**
     * Create a number type input definition.
     */
    public function number(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'number',
        ]);
    }

    /**
     * Create a boolean type input definition.
     */
    public function boolean(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'boolean',
        ]);
    }
}
