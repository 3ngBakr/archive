<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToProgramsTable extends Migration
{
   
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->foreignId('program_id')->nullable()
            ->constrained('programs')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
 
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->removeColumn('program_id');
        });
    }
}
