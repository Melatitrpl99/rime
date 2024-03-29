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
            $table->foreignId('discount_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->unsignedBigInteger('diskon_harga');
            $table->unsignedInteger('minimal_produk')->nullable();
            $table->unsignedInteger('maksimal_produk')->nullable();

            $table->primary(['discount_id', 'product_id']);
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
