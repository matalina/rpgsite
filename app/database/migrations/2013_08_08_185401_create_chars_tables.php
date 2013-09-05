<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chars', function(Blueprint $table) {
			$table->increments('id');
			
            $table->integer('user_id'); // owner
            $table->string('name');
            $table->string('slug');
            $table->integer('age');
            $table->boolean('gender')->default(0); //0 = male, 1 = female
            $table->string('origin');
            $table->text('description');
            $table->text('personality');
            $table->text('history');
            $table->text('notes');
            $table->text('stats'); // json file of stats
            $table->text('timeline'); // json file timeline of events
        
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
		Schema::drop('chars_tables');
	}

}
