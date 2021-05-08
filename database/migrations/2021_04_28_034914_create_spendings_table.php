<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpendingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('tanggal');
            $table->integer('nomor');
            $table->string('kategori');
            $table->text('deskripsi');
            $table->integer('jumlah_barang');
            $table->integer('total');
            $table->integer('biaya_tambahan');
            $table->integer('sub_total');
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
        Schema::drop('spendings');
    }
}
