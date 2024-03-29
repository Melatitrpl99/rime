<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama');
            $table->text('deskripsi');
            $table->unsignedBigInteger('harga_customer');
            $table->unsignedBigInteger('harga_reseller');
            $table->unsignedInteger('reseller_minimum');
            $table->string('slug')->nullable();
            $table->foreignId('product_category_id')->constrained();
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
        Schema::drop('products');
    }
}
