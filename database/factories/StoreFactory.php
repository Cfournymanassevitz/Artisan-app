<?php


namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
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


    public function definition() : array
    {
        $userIds = User::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'name' => $this->faker->company,
            'theme' => $this->faker->word,
            'biography' => $this->faker->paragraph,
        ];
    }
}
