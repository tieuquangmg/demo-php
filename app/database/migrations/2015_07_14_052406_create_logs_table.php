<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('logs', function($t) {
            // auto increment id (primary key)
            $t->increments('id');
            $t->string('action');
            $t->string('table');
            $t->integer('id_ingredient');
            $t->string('name_ingredient');
            // created_at, updated_at DATETIME
            $t->timestamps();
        });
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
