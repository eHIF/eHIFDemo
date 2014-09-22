<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visits', function(Blueprint $table) {
			$table->increments('id');
            $table->foreign("patient_id")
                ->references("id")->on("patients")
            ->onDelete('cascade');
            $table->dateTime("when");
            $table->text("symptoms");
            $table->text("diagnosis");
            $table->integer("doctoruser_id");
            $table->integer("receptionuser_id");
            $table->integer("patient_id");
            $table->foreign("receptionuser_id")->
                references("id")->on("users");
            $table->foreign("doctoruser_id")
                ->references("id")->on("users");
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
		Schema::drop('visits');
	}

}
