<?php namespace Blog\Extender;

use Backend;
use Blog\Extender\Classes\Events\CategoryHandler;
use Blog\Extender\Classes\Events\PostHandler;
use Event;
use System\Classes\PluginBase;
use \Illuminate\Database\Eloquent\Factories\Factory as EloquentFactory;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    public $require = [
        'RainLab.Blog'
    ];
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Extender',
            'description' => 'No description provided yet...',
            'author' => 'Blog',
            'icon' => 'icon-leaf'
        ];
    }


    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        Event::subscribe(new PostHandler());
        Event::subscribe(new CategoryHandler());
    }

}
