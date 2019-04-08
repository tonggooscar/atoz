<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('order_number')->unique();
			$table->unsignedBigInteger('id_users');
			$table->string('mobile_number', 12)->nullable();
			$table->enum('shopping_type', ['prepaid', 'product']);
			$table->unsignedBigInteger('id_balance')->nullable();
			$table->text('product')->nullable();
			$table->text('shipping_address')->nullable();
			$table->float('price')->nullable();
			$table->string('shipping_code', 8)->nullable();
			$table->enum('status', ['Waiting', 'Cancel', 'Success', 'Failed'])->default('Waiting');
            $table->timestamps();
			
			$table->foreign('id_users')
				->references('id')
				->on('users')
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
        Schema::dropIfExists('transaction');
    }
}
