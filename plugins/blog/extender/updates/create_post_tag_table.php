<?php namespace Blog\Extender\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreatePostTagTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('blog_extender_post_tag', function(Blueprint $table) {
            $table->integer('post_id');
            $table->integer('tag_id');
            $table->primary(['tag_id','post_id']);
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('blog_extender_post_tag');
    }
};
