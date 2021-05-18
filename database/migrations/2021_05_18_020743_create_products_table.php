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
            $table->longtext('deskripsi');
            $table->integer('harga_customer');
            $table->integer('harga_reseller');
            $table->integer('resellser_minimum');
            $table->string('warna');
            $table->string('size');
            $table->string('dimensi');
            $table->string('slug')->nullable();
            $table->foreignId('category_id')->constrained();
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
