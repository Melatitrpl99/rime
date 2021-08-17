<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpendingDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spending_details', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('spending_id')->constrained();
            $table->string('nama')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('qty')->nullable();
            $table->bigInteger('sub_total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('spending_details');
    }
}
