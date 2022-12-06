<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFieldToCategoriesTable extends Migration
{
  
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('category_name','category_name_bn')->nullable();
            $table->renameColumn('category_slug','category_slug_bn')->nullable();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
