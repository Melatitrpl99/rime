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
            $table->foreignId('order_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('color_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('size_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->integer('jumlah');
            $table->bigInteger('sub_total');
            $table->bigInteger('diskon')->nullable();

            $table->unique(['order_id', 'product_id', 'color_id', 'size_id']);
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
