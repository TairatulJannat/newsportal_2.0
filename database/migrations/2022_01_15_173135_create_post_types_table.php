<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePostTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable;
            $table->decimal('cost_per_post',10,2)->nullable();
            $table->timestamps();
        });
        DB::table('post_types')->insert([
            [
                'name' => 'Bangla_news',
                'cost_per_post' => '25'
            ],
            [
                'name' => 'English_news',
                'cost_per_post' => '35'
            ],
            [
                'name' => 'Both_news',
                'cost_per_post' => '40'
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
        Schema::dropIfExists('post_types');
    }
}
