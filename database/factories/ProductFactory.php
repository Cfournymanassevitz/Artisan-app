<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'story' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(),
            'material' => $this->faker->word,
            'color' => $this->faker->colorName,
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'category' => $this->faker->word,
            'shop_id' => null
        ];
    }
}
