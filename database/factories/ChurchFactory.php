<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChurchFactory extends Factory
{
    public function definition()
    {
        $name = $this->faker->company . ' Church';
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'zip' => $this->faker->postcode(),
            'phone' => $this->faker->phoneNumber(),
            'timezone' => 'America/New_York',
        ];
    }
}
