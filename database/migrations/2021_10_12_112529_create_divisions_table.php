<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('division_name')->nullable();
            $table->string('division_slug')->nullable();
            $table->timestamps();
        });
    }

  
  
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
