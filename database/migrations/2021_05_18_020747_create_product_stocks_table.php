<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStocksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('product_id')->constrained();
            $table->foreignId('product_color_id')->constrained();
            $table->foreignId('product_size_id')->constrained();
            $table->foreignId('product_dimension_id')->constrained();
            $table->integer('stok_ready');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_stocks');
    }
}
