<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserTypeFactory extends Factory
{
    public function definition(): array {
        return [
            'name' => $this->faker->word
        ];
    }
}
