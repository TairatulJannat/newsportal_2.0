<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsFrontendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings_frontends', function (Blueprint $table) {
            
            $table->id();
            $table->string('site_title')->nullable();;
            $table->string('site_name')->nullable();;
            $table->string('icon')->nullable();
            $table->string('fontend_header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('director_name')->nullable();
            $table->string('editor_name')->nullable();
            $table->string('publisher_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            
            
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
        Schema::dropIfExists('general_settings_frontends');
    }
}
