<?php namespace Blog\Extender\Models;

use Blog\Extender\Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends \RainLab\Blog\Models\Post
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return PostFactory::new();
    }
}
