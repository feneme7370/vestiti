<?php

namespace Database\Factories\Fnm;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fnm\Company>
 */
class CompanyFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber(),
            'adress' => $this->faker->randomElement(['Av. Maya 569', 'San juan 986', 'Del campo 996']),
            'city' => $this->faker->randomElement(['pehuajo', '9 de juli', 'carlos casares']),
            'status' => $this->faker->randomElement(['1', '0']),
            'social' => '{"facebook":"facebook.com","twitter":"twiter.com","instagram":"instagram.com","youtube":"youtube.com","tiktok":"tiktok.com"}'
        ];
    }
}
