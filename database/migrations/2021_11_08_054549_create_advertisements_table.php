<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->nullable();
            $table->string('position')->nullable();
            $table->string('ads_link')->nullable();
            $table->string('image')->nullable();
            $table->string('ads_status')->nullable();
            $table->timestamps();
        });
        DB::table('advertisements')->insert([
            [
                'page_name' => 'header',
                'position' => 'middle_of_header'
            ],
            [
                'page_name' => 'home',
                'position' => 'left_main_creasol'
            ],
            [
                'page_name' => 'home',
                'position' => 'bottom_main_news'
            ],
            [
                'page_name' => 'home',
                'position' => 'bottom_category'
            ],
            [
                'page_name' => 'home',
                'position' => 'bottom_feature_vedio'
            ],
            [
                'page_name' => 'home',
                'position' => 'bottom_image_gellary'
            ],
            [
                'page_name' => 'home',
                'position' => 'above_footer'
            ],
            [
                'page_name' => 'detail_page',
                'position' => 'above_single_post'
            ],
            [
                'page_name' => 'detail_page',
                'position' => 'above_related_post'
            ],
            [
                'page_name' => 'detail_page',
                'position' => 'above_comment'
            ],
            [
                'page_name' => 'list_post',
                'position' => 'after_main_content'
            ],
            [
                'page_name' => 'list_page',
                'position' => 'bellow_list_news'
            ],
            [
                'page_name' => 'video_gallery',
                'position' => 'bottom_single_vedio'
            ],
            [
                'page_name' => 'video_gallery',
                'position' => 'bottom_more_vedio'
            ],
            [
                'page_name' => 'Right_column',
                'position' => 'bellow_recent_news'
            ],
            [
                'page_name' => 'Right_column',
                'position' => 'bellow_calender'
            ],
            [
                'page_name' => 'Right_column',
                'position' => 'bellow_tab_content'
            ],


        ]
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
