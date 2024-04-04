<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use Faker\Generator as Faker;


class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'command_number' => $this->faker->uuid,
            'user_id' => $this->faker->uuid,
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
