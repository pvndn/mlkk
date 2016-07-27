<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('email', 100);
            $table->string('phone', 15);
            $table->string('address', 20);
            $table->string('messages');
            $table->decimal('amount', 15,0);
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');
            $table->decimal('amount', 15,0);
            $table->tinyInteger('status');
            $table->text('data');
            $table->integer('transaction_id')->unsigned();
            $table->foreign('transaction_id')
                    ->references('id')
                    ->on('transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('orders');
        Schema::drop('transactions');
    }
}
