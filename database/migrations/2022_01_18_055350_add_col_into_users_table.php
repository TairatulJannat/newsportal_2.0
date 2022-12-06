<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColIntoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->integer('bonus_status')->after('email')->default(0);
            $table->decimal('bonus_amount',10,2)->after('email')->default(0);
            $table->unsignedBigInteger('wallet_id')->after('email')->on('wallets')->index('wallets_wallets_id_foreign')->onDelete('cascade')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_status','bonus_amount','transition_id');
    }
}
