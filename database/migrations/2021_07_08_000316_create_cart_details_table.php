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
            $table->id('id');
            $table->foreignId('cart_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('color_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('size_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unsignedInteger('jumlah');
            $table->unsignedBigInteger('sub_total');

            $table->unique(['cart_id', 'product_id', 'color_id', 'size_id']);
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
