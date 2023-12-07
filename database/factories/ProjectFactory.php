<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name(),
            'description'       => $this->faker->text(),
            'number_of_tasks'   => 0,
            'completed_tasks'   => 0,
            'admin_id'          => 18,
        ];
    }
}
