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
            $table->bigInteger('total')->nullable();
            $table->string('kode_diskon')->nullable();
            $table->bigInteger('biaya_pengiriman')->nullable();
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
