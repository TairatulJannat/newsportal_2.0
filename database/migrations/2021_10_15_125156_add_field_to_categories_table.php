<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToCategoriesTable extends Migration
{
 
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('category_name_en')->nullable()->after('category_name_bn');
            $table->string('category_slug_en')->nullable()->after('category_name_en');
            $table->string('status')->nullable()->after('category_slug_en');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
