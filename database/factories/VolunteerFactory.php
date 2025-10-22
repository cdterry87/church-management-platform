<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Volunteer>
 */
class VolunteerFactory extends Factory
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
            'team_id' => \App\Models\Team::factory(),
            'role' => $this->faker->jobTitle(),
            'active' => $this->faker->boolean(),
        ];
    }
}
