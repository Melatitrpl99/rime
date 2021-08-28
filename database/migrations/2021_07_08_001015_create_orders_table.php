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
            $table->bigInteger('total')->nullable();
            $table->bigInteger('biaya_pengiriman')->nullable();
            $table->integer('berat')->nullable();
            $table->string('kode_resi')->nullable();
            $table->foreignId('payment_method_id')->constrained();
            $table->foreignId('discount_id')->nullable()->constrained();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('user_shipment_id')->constrained();
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
