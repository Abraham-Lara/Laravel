<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>1,
            'titulo' => $titulo = $this->faker->sentence(),
            'enlace' => Str::slug($titulo),
            'cuerpo' => $this->faker->text(200),
        ];
    }
}
