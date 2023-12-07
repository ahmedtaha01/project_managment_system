<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name(),
            'description'   => $this->faker->text(),
            'deadline'      => $this->faker->dateTime(),
            'user_id'       => 1,
            'project_id'    => Project::all()->random()->id,
            'status'        => $this->faker->randomElement(['to do','in progress','code review', 'done']),
            'priority'      => $this->faker->randomElement(['1','2','3','4','5','6','7','8','9']),
        ];
    }
}
