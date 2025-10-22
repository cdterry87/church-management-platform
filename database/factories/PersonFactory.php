<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
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
            'family_id' => \App\Models\Family::factory(),
            'user_id' => \App\Models\User::factory(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'birthdate' => $this->faker->date(),
            'gender'    => $this->faker->randomElement(['male', 'female', 'other']),
            'status' =>  $this->faker->randomElement(['member', 'guest', 'inactive']),
            'notes' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
