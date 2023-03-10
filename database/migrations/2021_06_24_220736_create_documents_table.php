<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
	public function up()
	{
		Schema::create('documents', function (Blueprint $table) {
			$table->id();
			$table->string('dateOfBublish')->nullable();
			$table->string('numberOfPaper')->nullable();
			$table->string('name')->unique();
			$table->string('sender')->nullable();
			$table->string('reciver')->nullable();
			$table->longText('description')->nullable();
			$table->longText('note')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('documents');
	}
}
