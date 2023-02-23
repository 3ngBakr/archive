<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentDocumentTypePivotTable extends Migration
{
	public function up()
	{
		Schema::create('documents_types', function (Blueprint $table) {
			$table->foreignId('document_id')
			      ->constrained('documents')
			      ->cascadeOnDelete()->cascadeOnUpdate();
			$table->foreignId('document_type_id')
			      ->constrained('document_types')
			      ->cascadeOnDelete()->cascadeOnUpdate();
		});
	}

	public function down()
	{
		Schema::dropIfExists('documents_types');
	}
}
