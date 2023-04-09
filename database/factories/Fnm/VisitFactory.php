<?php

namespace Database\Factories\Fnm;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fnm\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(1),
            'slug' => Str::slug($this->faker->sentence(1)),
            'date' => $this->faker->date(),
            'apiary_id' => $this->faker->numberBetween('1','10'),
            'campaign_id' => $this->faker->numberBetween('1','3'),
            'type_visit_id' => $this->faker->numberBetween('1','4'),
            'amount' => $this->faker->randomElement(['10', '13', '17', '30', '40', '45']),
            'description' => $this->faker->randomElement(['una breve descripcion', 'otra descripcion', 'tercera descripcion']),
            'remember' => $this->faker->randomElement(['una breve recordatorio', 'otra recordatorio', 'tercera recordatorio']),
            'status' => $this->faker->randomElement(['1', '1']),
            'company_id' => '1',
            'user_id' => '1',
        ];
    }
}
