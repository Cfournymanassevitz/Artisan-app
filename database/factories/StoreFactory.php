<?php


namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    protected $model = Store::class;
    public function definition(): array
    {
        return [
            // database/factories/StoreFactory.php
            'id' => $this->uuid,
            'User_id' => $this->uuid,
            'name' => $this->company,
            'theme' => $this->colorName,
            'biography' => $this->paragraph,
            'created_at' => $this->dateTimeBetween('-2 years', 'now'),
            'updated_at' => $this->dateTimeBetween('-2 years', 'now'),
        ];
    }
    }
