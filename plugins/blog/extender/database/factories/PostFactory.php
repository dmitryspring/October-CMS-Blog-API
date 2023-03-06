<?php namespace Blog\Extender\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Blog\Extender\Models\Post;

class PostFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /**
         * Массив структуры фейкового поста
         */
        $postMap = [
            [
                "html"   => "<h2>%s</h2>",
                "md"     => "## %s" . PHP_EOL,
                "length" => fake()->numberBetween(10, 20)
            ],
            [
                "html"   => "<p>%s</p>",
                "md"     => "%s" . PHP_EOL,
                "length" => fake()->numberBetween(100, 200)
            ],
            [
                "html"   => "<p>%s</p>",
                "md"     => "%s" . PHP_EOL,
                "length" => fake()->numberBetween(100, 200)
            ],
            [
                "html"   => "<h3>%s</h3>",
                "md"     => "### %s" . PHP_EOL,
                "length" => fake()->numberBetween(10, 20)
            ],
            [
                "html"   => "<p>%s</p>",
                "md"     => "%s" . PHP_EOL,
                "length" => fake()->numberBetween(100, 200)
            ],
        ];

        /**
         * Генерируем пост по его структуре
         */
        $post = collect($postMap)->reduce(function ($carry, $item) {
            $carry['html'][] = sprintf($item['html'], fake()->realText($item['length']));
            $carry['md'][] = sprintf($item['md'], fake()->realText($item['length']));
            return $carry;
        }, []);

        $title = fake()->realText(fake()->numberBetween(15, 50));
        return [
            'title'        => $title,
            'slug'         => str_slug($title),
            'excerpt'      => fake()->realText(fake()->numberBetween(100, 200)),
            'content_html' => join('', $post['html']),
            'content'      => join('', $post['md']),
            'published'    => 1,
            'published_at' => Carbon::now()->subDays(rand(0, 365))->subMinutes(rand(0, 55))
        ];
    }
}
