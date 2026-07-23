<?php

namespace Database\Factories;

use App\Models\Mobile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mobile>
 */
class MobileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'model_number' => $this->faker->unique()->ean13(),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'brand' => $this->faker->company(),
        ];
    }
}
