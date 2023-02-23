<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
	public function up()
	{
		Schema::create('programs', function (Blueprint $table) {
			$table->id();
			$table->string('name', 125)->unique();
			$table->text('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('programs');
	}
}
