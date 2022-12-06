<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('category_id')->nullable()->index('categories_category_id_foreign')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable()->index('subcategories_sub_cat_id_foreign')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->index('users_user_id_foreign')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('division_id')->nullable()->index('divisions_division_id_foreign')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('district_id')->nullable()->index('districts_district_id_foreign')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('subdistrict_id')->nullable()->index('sub_districts_district_id_foreign')->onDelete('cascade')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_bn')->nullable();
            $table->string('image')->nullable();
            $table->longText('details_en')->nullable();
            $table->longText('details_bn')->nullable();
            $table->string('tags_en')->nullable();
            $table->string('tags_bn')->nullable();
            $table->string('headline_en')->nullable();
            $table->integer('headline_bn')->default(0);
            $table->integer('thumbnail_select')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('category_first_section')->nullable();
            $table->integer('subcategory_first_section')->nullable();
            $table->integer('division_first_section')->nullable();
            $table->integer('district_first_section')->nullable();
            $table->date('published_date')->nullable();
            $table->integer('headline')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->integer('view')->nullable();
            $table->string('stage')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
