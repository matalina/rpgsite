<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topic', function(Blueprint $table) {
			$table->increments('id');
            
            $table->string('title');
            $table->string('slug')->unique();;
            $table->integer('user_id')->unsigned(); // original author
            $table->integer('post_id')->unsigned(); // first post 
            $table->integer('forum_id')->unsigned();
            
            // stats
            $table->integer('post_count');
            $table->datetime('last_post_time');
            $table->integer('last_post');
            $table->integer('last_author');
            $table->integer('view_count');
			
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
		Schema::drop('topics');
	}

}
