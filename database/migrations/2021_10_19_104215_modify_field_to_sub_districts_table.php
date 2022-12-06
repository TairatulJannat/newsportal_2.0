<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFieldToSubDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_districts', function (Blueprint $table) {
            $table->renameColumn('subdistrict_name','subdistrict_name_bn')->nullable();
            $table->renameColumn('subdistrict_slug','subdistrict_slug_bn')->nullable();
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
