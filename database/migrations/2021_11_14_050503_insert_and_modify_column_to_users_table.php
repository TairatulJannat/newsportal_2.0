<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertAndModifyColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name' , 'name_bn')->nullable();
            $table->string('name_en')->after('name')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->string('address_present')->after('email')->nullable();
            $table->string('address_permanent')->after('email')->nullable();
            $table->integer('status')->after('email')->default(1);
            $table->string('type')->after('email')->nullable();
            $table->longText('about')->after('email')->nullable();
            $table->bigInteger('division')->after('email')->unsigned()->nullable();
            $table->foreign('division')->references('id')->on('divisions')->onDelete('cascade')->nullable();
            $table->bigInteger('district')->after('email')->unsigned()->nullable();
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade')->nullable();
            $table->bigInteger('city')->after('email')->unsigned()->nullable();
            $table->foreign('city')->references('id')->on('sub_districts')->onDelete('cascade')->nullable();
            $table->string('zip_code')->after('email')->nullable();
            $table->longText('saved_post')->after('email')->nullable();
            $table->integer('category_role')->after('email')->default(0);
            $table->integer('country_role')->after('email')->default(0);
            $table->integer('jobpost_role')->after('email')->default(0);
            $table->integer('post_role')->after('email')->default(0);
            $table->integer('writer_role')->after('email')->default(0);
            $table->integer('ads_role')->after('email')->default(0);
            $table->integer('page_role')->after('email')->default(0);
            $table->integer('reports_role')->after('email')->default(0);
            $table->integer('user_role')->after('email')->default(0);
            $table->integer('gallery_role')->after('email')->default(0);
            $table->integer('seo_role')->after('email')->default(0);
            $table->integer('settings_role')->after('email')->default(0);
            $table->integer('blog_role')->after('email')->default(0);
            $table->integer('comments_role')->after('email')->default(0);
            $table->integer('blog_comments_role')->after('email')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
