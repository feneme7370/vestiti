<?php

namespace Database\Factories\Fnm;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fnm\Apiary>
 */
class ApiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'slug' => Str::slug($this->faker->company),
            'location' => $this->faker->randomElement(['Av. Maya 569', 'San juan 986', 'Del campo 996']),
            'hive' => $this->faker->numberBetween('1','50'),
            'description' => $this->faker->randomElement(['una breve descripcion', 'otra descripcion', 'tercera descripcion']),
            'status' => $this->faker->randomElement(['1', '1']),
            'company_id' => '1',
            'user_id' => '1',
        ];
    }
}
