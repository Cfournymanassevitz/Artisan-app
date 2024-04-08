<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use Faker\Generator as Faker;


class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $user = User::all()->first();

        return [

            'command_number' => $this->faker->uuid,
            'user_id' => $user->id, // Get the first user id (if any
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
