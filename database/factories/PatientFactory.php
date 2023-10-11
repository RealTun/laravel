<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenBenhNhan' => $this->faker->name,
            'ngayKham' => $this->faker->date,
            'trieuChung' => $this->faker->word,
            'idBacSi' => null
        ];
    }
}
