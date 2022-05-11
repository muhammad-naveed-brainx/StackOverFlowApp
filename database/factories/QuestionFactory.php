<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'vote' => $this->faker->numberBetween(0,6),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
