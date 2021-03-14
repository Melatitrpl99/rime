<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('diskon_harga');
            $table->integer('minimal_produk')->nullable();
            $table->integer('maksimal_produk')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('discount_id')->references('id')->on('discounts');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('discount_details');
    }
}
