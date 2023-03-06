<?php namespace Blog\Extender\Updates;

use RainLab\Blog\Models\Post;
use Seeder;
use System\Models\File;

class SeedImagesToPosts extends Seeder
{
    public function run()
    {
        Post::all()->each(function ($post) {
            if ($post->featured_images->count() == 0) {
                try {
                    $post->featured_images()->add((new File)->fromUrl('https://picsum.photos/800/600'));
                } catch (\Throwable $exception) {
                    trace_log($exception->getMessage());
                }
            };
        });
    }
}

