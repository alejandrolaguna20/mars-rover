<?php

namespace Database\Factories;

use App\Models\MissionLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissionLogFactory extends Factory
{
    protected $model = MissionLog::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'message' => $this->faker->sentence(),
            'details' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['INFO', 'WARNING', 'ERROR']),
            'created_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
        ];
    }
}
