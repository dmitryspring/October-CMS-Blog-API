<?php namespace Blog\Extender\Models;

use Blog\Extender\Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Model;
use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\Validation;
use RainLab\Blog\Models\Post;

/**
 * Tag Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Tag extends Model
{
    use Validation;
    use HasFactory;
    use Sluggable;

    /**
     * @var string table name
     */
    public $table = 'blog_extender_tags';

    /**
     * @var array rules for validation
     */
    public $rules = ['name' => ['required']];

    /**
     * @var string[]
     */
    protected $slugs = ['slug' => 'name'];

    /**
     * @var string[]
     */
    public $belongsToMany = [
        Post::class,
        'table' => 'blog_extender_post_tag'
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return TagFactory::new();
    }
}
