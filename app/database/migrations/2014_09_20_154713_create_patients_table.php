<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id');
			$table->string("name");
			$table->string("surname");
			$table->string("amka");
			$table->string("fathername");
			$table->string("mothername");
			$table->string("address");
			$table->string("phone");
			$table->string("mobile");
			$table->string("zip");
			$table->string("area");
			$table->string("nationality");
			$table->date("birthday");
            $table->foreign('gender_id')
                ->references('id')->on('genders');
            $table->foreign('socialsecurity_id')
                ->references('id')->on('socialsecurities');

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
		Schema::drop('patients');
	}

}
