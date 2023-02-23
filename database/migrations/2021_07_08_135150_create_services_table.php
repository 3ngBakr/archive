<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
	public function up()
	{
		Schema::create('services', function (Blueprint $table) {
			$table->id();
			$table->string('name', 50)->unique();
			$table->longText('content');
			$table->text('description')->nullable();
			$table->boolean('order_all_child')->default(false);
		//	$table->string('image');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('services');
	}
}
