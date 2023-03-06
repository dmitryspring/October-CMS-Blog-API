<?php namespace Blog\Api\Http\Controllers;

use Blog\Api\Http\Resources\PostResource;
use Illuminate\Routing\Controller;
use RainLab\Blog\Models\Category;
use RainLab\Blog\Models\Post;

class PostController extends Controller
{
    /**
     * @param Category|null $category
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Category $category = null): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        if ($category) {
            return PostResource::collection($category->posts()->paginate());
        }

        return PostResource::collection(Post::query()->paginate());
    }

    /**
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        return PostResource::make($post);
    }

    public function store() {}
    public function update() {}
    public function destroy() {}
}
