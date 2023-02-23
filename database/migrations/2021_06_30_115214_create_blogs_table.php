<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function (Blueprint $table) {
			$table->id();
			$table->foreignId('author_id')
			      ->constrained('users')
			      ->cascadeOnDelete()->cascadeOnUpdate();
			$table->string('title')->unique();
			$table->text('content');
			$table->enum('type', array_keys(config("ryada.our_blogs_types")));
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
		Schema::dropIfExists('blogs');
	}
}
