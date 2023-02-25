<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'address' => fake()->address(),
            'phone' => fake()->unique()->e164PhoneNumber(),
            'rank' => Author::getRanks()[rand(0, count(Author::getRanks()) - 1)],
            'nationality' => Author::getNationalities()[rand(0, count(Author::getNationalities()) - 1)],
            'mail' => fake()->unique()->email(),
            'date_of_birth' => fake()->date(),
            'email_verified_at' => fake()->date()
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
