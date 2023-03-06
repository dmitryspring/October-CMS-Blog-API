<?php namespace Blog\Extender\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Blog\Extender\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = join(' ', fake()->words(fake()->numberBetween(1, 3)));
        return [
            'name'        => ucfirst($name),
            'slug'        => str_slug($name),
            'description' => fake()->realText(fake()->numberBetween(100, 200))
        ];
    }
}
