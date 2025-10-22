<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_at' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'end_at' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'location' => $this->faker->address(),
            'type' => $this->faker->randomElement(['service', 'meeting', 'outreach', 'other']),
            'is_recurring' => $this->faker->boolean(20),

        ];
    }
}
