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
            $table->string('nama')->nullable();
            $table->text('ket')->nullable();
            $table->bigInteger('harga_satuan')->nullable();
            $table->unsignedInteger('jumlah')->nullable();
            $table->bigInteger('sub_total')->nullable();
            $table->foreignId('spending_id')->constrained();
            $table->foreignId('spending_unit_id')->nullable()->constrained();
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
