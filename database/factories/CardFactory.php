<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(8, true),
            'password' => Str::random(12),
        ];
    }
}
