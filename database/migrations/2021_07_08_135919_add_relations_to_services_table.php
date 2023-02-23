<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToServicesTable extends Migration
{
	public function up()
	{
		Schema::table('services', function (Blueprint $table) {
			$table->foreignId('service_id')->nullable()
			      ->constrained('services')
			      ->cascadeOnUpdate()
			      ->cascadeOnDelete();
		});
	}

	public function down()
	{
		Schema::table('services', function (Blueprint $table) {
			$table->removeColumn('service_id');
		});
	}
}
