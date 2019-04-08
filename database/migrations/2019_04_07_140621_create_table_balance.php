<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('balance_value')->unsigned();
            $table->timestamps();
        });
		
		Schema::table('transaction', function (Blueprint $table) {
			$table->foreign('id_balance')
				->references('id')
				->on('balance')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('transaction', function (Blueprint $table) {
			$table->dropForeign('transaction_id_balance_foreign');
		});

        Schema::dropIfExists('balance');
    }
}
