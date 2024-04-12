<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            // Añadir aleatoriamente un nombre
            'name' => $this->faker->name(),
            // Añadir aleatoriamente un email
            'email' => $this->faker->email(),
            // Añadir aleatoriamente teléfono en el formato de 9 digitos
            'phone' => $this->faker->numerify('#########'),
            // Añadir aleatoriamente un idioma de los siguientes: Spanish, English, French
            'language' => $this->faker->randomElement(['Spanish', 'English', 'French'])

        ];
    }
}
