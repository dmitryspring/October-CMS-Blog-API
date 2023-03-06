<?php namespace Blog\Api\Http\Controllers;

use Blog\Api\Http\Resources\CategoryResource;
use Illuminate\Routing\Controller;
use RainLab\Blog\Models\Category;

class CategoryController extends Controller
{
    /**
     * Show all categories
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(){
        return CategoryResource::collection(Category::all());
    }

    /**
     * Show one category
     *
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Category $category): CategoryResource
    {
        return CategoryResource::make($category);
    }

    public function store() {}
    public function update() {}
    public function destroy() {}
}
