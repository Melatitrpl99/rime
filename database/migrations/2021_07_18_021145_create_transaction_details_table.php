<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->foreignId('transaction_id')->constrained();
            $table->foreignId('order_id')->constrained();
            $table->bigInteger('sub_total');
            $table->softDeletes();

            $table->primary(['transaction_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_details');
    }
}
