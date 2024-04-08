<?php


namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @property $uuid
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    protected $model = Store::class;
    protected $company;
    protected $colorName;
    protected $paragraph;

    public function definition(): array
    {
        return [

            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // select an existing user id
            'name' => $this->faker->company,
            'theme' => $this->faker->colorName,
            'biography' => $this->faker->paragraph,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
