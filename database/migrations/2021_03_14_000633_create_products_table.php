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
            $table->bigIncrements('id');
            $table->string('nama');
            $table->longtext('deskripsi');
            $table->integer('stok');
            $table->integer('harga_customer');
            $table->integer('harga_reseller');
            $table->integer('grosir_minimum');
            $table->string('warna');
            $table->string('ukuran');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
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
