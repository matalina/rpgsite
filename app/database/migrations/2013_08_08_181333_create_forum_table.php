<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum', function(Blueprint $table) {
			$table->increments('id');
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('category_id')->unsigned();
            $table->integer('order');
            $table->boolean('ooc')->default(0); // 1 = yes (OOC), 0 = no (IC)
            
            // stats
            $table->integer('post_count');
            $table->integer('topic_count');
            $table->datetime('last_post_time');
            $table->integer('last_topic');
            $table->integer('last_post');
            $table->integer('last_author');
            
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('forum');
	}

}
