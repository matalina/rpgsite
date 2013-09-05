<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotMessageUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('message_id')->unsigned();
			$table->integer('user_id')->unsigned(); // receipient
            $table->boolean('read')->default(0);
            $table->datetime('read_on');
            $table->boolean('sender')->default(0); // sender
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
		Schema::drop('message_user');
	}

}
