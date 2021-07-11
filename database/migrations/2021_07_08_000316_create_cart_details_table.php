<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->foreignId('cart_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('color_id')->nullable()->constrained();
            $table->foreignId('size_id')->nullable()->constrained();
            $table->foreignId('dimension_id')->nullable()->constrained();
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->softDeletes();

            $table->primary(['cart_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cart_details');
    }
}
