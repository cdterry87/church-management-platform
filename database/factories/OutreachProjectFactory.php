<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutreachProject>
 */
class OutreachProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'church_id' => \App\Models\Church::factory(),
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->dateTimeBetween('now', '+6 months'),
            'end_date' => $this->faker->dateTimeBetween('+6 months', '+1 year'),
            'budget' => $this->faker->randomFloat(2, 1000, 10000),
        ];
    }
}
