<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalCostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('tanggal');
            $table->integer('nomor');
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('total');
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
        Schema::drop('additional_costs');
    }
}
