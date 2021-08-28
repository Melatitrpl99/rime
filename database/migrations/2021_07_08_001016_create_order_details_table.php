<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('color_id')->constrained();
            $table->foreignId('size_id')->constrained();
            $table->integer('jumlah');
            $table->bigInteger('sub_total');
            $table->bigInteger('diskon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_details');
    }
}
