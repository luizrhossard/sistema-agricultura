<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VegetalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->word(),
            'categoria' => $this->faker->randomElement(['vegetal', 'fruta', 'legume']),
            'descricao' => $this->faker->sentence(),
            'tempo_plantio_dias' => $this->faker->numberBetween(20, 120),
            'profundidade_plantio_cm' => $this->faker->randomFloat(2, 1, 10),
            'distancia_entre_plantas_cm' => $this->faker->numberBetween(10, 60),
            'umidade_solo_percentual' => $this->faker->numberBetween(30, 80),
            'clima' => $this->faker->randomElement(['Tropical', 'Temperado', 'Semiárido']),
            'imagem' => null,
        ];
    }
}
