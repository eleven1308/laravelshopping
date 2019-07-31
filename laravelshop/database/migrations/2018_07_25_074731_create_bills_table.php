<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_order');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->dateTime('date_order');
            $table->string('payment');
            $table->integer('status')->default(0);
            $table->string('note');
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
        Schema::dropIfExists('bills');
    }
}
