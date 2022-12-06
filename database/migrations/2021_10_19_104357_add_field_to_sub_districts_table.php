<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToSubDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_districts', function (Blueprint $table) {
            $table->string('subdistrict_name_en')->nullable()->after('subdistrict_name_bn');
            $table->string('subdistrict_slug_en')->nullable()->after('subdistrict_slug_bn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_districts', function (Blueprint $table) {
            //
        });
    }
}
