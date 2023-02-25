<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Faker\Core\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
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
            'title' => $this->title(),
            'description' => fake()->realText(),
            'rank' => Book::getBookLevels()[rand(0, count(Book::getBookLevels()) - 1)],
            'number_pages' => fake()->numberBetween(),
            'isbn' => fake()->ean13(),
            'price' => fake()->randomFloat(2, 0, 200),
            'lang' => Book::getBookLang()[rand(0, count(Book::getBookLang()) - 1)],
            'author_id' => Author::all()->random()->id,
        ];
    }

    private function title(): string
    {
        $sentence = fake()->sentence(5);
        return substr($sentence, 0, strlen($sentence) - 1);
    }

    public function ISBN()
    {
        return fake()->ean13();
    }

    public function setAuthor(): static
    {
        return $this->state(fn($uuid) => [
            'author_id' => $uuid,
        ]);
    }
}
