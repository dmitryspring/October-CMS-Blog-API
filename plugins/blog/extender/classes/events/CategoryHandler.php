<?php namespace Blog\Extender\Classes\Events;

use RainLab\Blog\Models\Category;

class CategoryHandler
{
    public function subscribe($events)
    {
        $this->extend();
    }

    public function extend()
    {
        Category::extend(function (Category $model){
            //...
        });
    }
}
