<?php namespace Blog\Extender\Updates;

use Blog\Extender\Models\Category;
use Blog\Extender\Models\Post;
use Seeder;

class SeedUsersTable extends Seeder
{
    public function run()
    {
        for ($i = 0; $i <= 10; $i++){
            try {
                Category::factory()
                    ->has(
                        Post::factory()
                            ->count(rand(5, 10))
                            ->hasTags(rand(2,5)),
                        'posts'
                    )
                    ->create();
            } catch (\Throwable $exception) {
                trace_log($exception->getMessage());
            }
        }
    }
}
