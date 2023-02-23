<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReadToContactsTable extends Migration
{
	public function up()
	{
		Schema::table('contacts', function (Blueprint $table) {
			$table->boolean('is_read')->default(0);
		});
	}

	public function down()
	{
		Schema::table('contacts', function (Blueprint $table) {
			$table->removeColumn('is_read');
		});
	}
}
