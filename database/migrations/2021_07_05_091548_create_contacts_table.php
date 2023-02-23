<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
	public function up()
	{
		Schema::create('contacts', function (Blueprint $table) {
			$table->id();
			$table->string('name', 50);
			$table->string('email', 60);
			$table->string('subject', 80);
			$table->string('phone', 9);
			$table->text('message');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('contacts');
	}
}
