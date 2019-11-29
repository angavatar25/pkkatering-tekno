<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('food_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->integer('amount');
            $table->integer('total_payment_amount');
            $table->integer('delivery_type');
            $table->integer('payment_type');
            $table->string('proof')->nullable();
            $table->integer('confirmation')->default(0);
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
        Schema::dropIfExists('transactions');
    }
}
