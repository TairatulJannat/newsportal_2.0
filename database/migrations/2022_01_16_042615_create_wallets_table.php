<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index('users_user_id_foreign')->onDelete('cascade')->nullable();
            $table->integer('bangla_post_count')->nullable;
            $table->integer('english_post_count')->nullable;
            $table->integer('both_post_count')->nullable;
            $table->decimal('Total_balance_without_bonus')->default(0);
            $table->decimal('Total_balance_bonus')->default(0);
            $table->decimal('Total_withdaw')->default(0);
            $table->decimal('bonus')->default(0);
            
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
        Schema::dropIfExists('wallets');
    }
}
