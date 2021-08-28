<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        return [
            'id'            => $this->faker->uuid,
            'loggable_type' => 'App\Models\User',
            'loggable_id'   => $this->faker->randomElement($userIds),
            'user_agent'    => $this->faker->userAgent,
            'ip_address'    => $this->faker->ipv4,
            'log'           => $this->faker->text,
        ];
    }
}
