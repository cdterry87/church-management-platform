<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
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
            'person_id' => \App\Models\Person::factory(),
            'amount' => $this->faker->randomFloat(2, 5, 1000),
            'donated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
