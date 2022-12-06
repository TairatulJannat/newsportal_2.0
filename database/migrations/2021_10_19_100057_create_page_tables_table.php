<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_tables', function (Blueprint $table) {
            $table->id();
            $table->string('page_title_bn')->nullable();
            $table->string('page_title_en')->nullable();
            $table->string('description_title_bn')->nullable();
            $table->string('description_title_en')->nullable();
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
        Schema::dropIfExists('page_tables');
    }
}
