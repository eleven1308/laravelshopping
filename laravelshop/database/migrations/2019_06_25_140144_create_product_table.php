<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('trademark');
            $table->float('util_price');
            $table->float('promotion_price');
            $table->integer('status')->default(1);
            $table->integer('like')->nullable();
            $table->integer('is_hot')->nullable();
            $table->integer('all_views')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('views')->nullable();
            $table->string('materials')->nullable();
            $table->integer('category_id');
            $table->integer('producttype_id');
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
        Schema::dropIfExists('product');
    }
}
