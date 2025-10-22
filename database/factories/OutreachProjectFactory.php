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
            'start_at' => $this->faker->dateTimeBetween('now', '+6 months'),
            'end_at' => $this->faker->dateTimeBetween('+6 months', '+1 year'),
            'goal' => $this->faker->randomFloat(2, 1000, 10000),
            'location' => $this->faker->address(),
        ];
    }
}
