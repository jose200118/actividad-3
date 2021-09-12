<?php

namespace Database\Factories;

use App\Models\Programas;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreprograma' => $this->faker->sentence(),
        ];
    }
}
