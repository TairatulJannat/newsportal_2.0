<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('reporter_name_bn')->nullable();
            $table->string('reporter_name_en')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('facebook')->nullable();
            $table->integer('nid')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
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
        Schema::dropIfExists('reporters');
    }
}
