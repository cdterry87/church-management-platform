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
            'uuid' => Str::uuid(),
            'description' => $this->faker->paragraph,
            'logo_path' => null,
        ];
    }
}
