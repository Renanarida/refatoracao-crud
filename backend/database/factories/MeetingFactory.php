<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    protected $model = Meeting::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $end = (clone $start)->modify('+1 hour');

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'organizer_id' => User::factory(),
            'start_time' => $start,
            'end_time' => $end,
            'location' => $this->faker->city(),
            'participants' => [$this->faker->email(), $this->faker->email()],
        ];
    }
}
