<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('service_order', function (Blueprint $table) {
			$table->foreignId('service_id')->constrained('services')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('order_id')->constrained('orders')->cascadeOnUpdate()->cascadeOnDelete();
		});
	}

	public function down()
	{
		Schema::dropIfExists('service_order');
	}
};
