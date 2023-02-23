<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->id();
			$table->string('name', 50);
			$table->string('email', 60);
			$table->string('personal_phone', 9);
			$table->string('company_phone', 9);
			$table->string('company', 50);
			$table->string('position', 30);
			$table->longText('message');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('orders');
	}
};