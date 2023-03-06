<?php namespace Blog\Extender\Classes\Events;

use Blog\Extender\Models\Tag;
use Event;
use RainLab\Blog\Models\Post;
use System\Models\File;

class PostHandler
{
    /**
     * @param $events
     * @return void
     */
    public function subscribe($events): void
    {
        $this->extend();
        $this->listen();
    }

    /**
     * @return void
     */
    public function extend(): void
    {
        Post::extend(function (Post $model){
            /**
             * Relations
             */
            $model->belongsToMany['tags'] = [
                Tag::class,
                'table' => 'blog_extender_post_tag'
            ];
        });
    }

    /**
     * @return void
     */
    public function listen(): void
    {
        Event::listen('backend.form.extendFields', function (\Backend\Widgets\Form $form){
            if (!$form->model instanceof Post) return;

            $form->addSecondaryTabFields([
                'tags' => [
                    'label' => 'Теги',
                    'type'  => 'taglist',
                    'mode'  => 'relation',
                    'tab'   => 'Теги'
                ]
            ]);
        });
    }
}
