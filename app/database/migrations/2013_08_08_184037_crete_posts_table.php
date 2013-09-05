<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CretePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('entry');
            $table->integer('user_id')->unsigned(); // author
            $table->integer('char_id')->nullable()->unsigned(); // character
            $table->integer('topic_id')->unsigned();
            $table->text('edited_text');
            
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
		Schema::drop('posts');
	}

}
