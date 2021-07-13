<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id');
            $table->string('nomor')->unique();
            $table->text('pesan')->nullable();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('total')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('biaya_pengiriman')->nullable();
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
        Schema::drop('orders');
    }
}
