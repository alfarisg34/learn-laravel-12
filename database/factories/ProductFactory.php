<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'picture' => null, // or $this->faker->imageUrl()
            'desc' => $this->faker->paragraph(),
            'last_edited_by' => User::factory(),
            'rating' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}
