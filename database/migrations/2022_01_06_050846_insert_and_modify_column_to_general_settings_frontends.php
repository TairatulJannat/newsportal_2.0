<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertAndModifyColumnToGeneralSettingsFrontends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings_frontends', function (Blueprint $table) {

      
            $table->string('site_title_bn')->nullable()->after('site_title');
            $table->string('site_name_bn')->nullable()->after('site_name');
            $table->string('icon_bn')->nullable()->after('icon');
            $table->string('fontend_header_logo_bn')->nullable()->after('fontend_header_logo');
            $table->string('footer_logo_bn')->nullable()->after('footer_logo');
            $table->string('director_name_bn')->nullable()->after('director_name');
            $table->string('editor_name_bn')->nullable()->after('director_name');
            $table->string('publisher_name_bn')->nullable()->after('publisher_name');
            $table->longText('description_bn')->nullable()->after('description'); 
           
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_settings_frontends', function (Blueprint $table) {
            //
        });
    }
}
