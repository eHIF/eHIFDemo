<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table) {
			$table->increments('id');
			$table->string("comments");
            $table->dateTime("start");
            $table->dateTime("end");
            $table->integer("patient_id");
        //    $table->foreign("reccurent_id")
           //     ->references("id")->on("reccurents");
            $table->foreign("patient_id")
                ->references("id")->on("patients");

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
		Schema::drop('appointments');
	}

}
