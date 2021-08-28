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
            $table->id('id');
            $table->string('nomor')->unique();
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamp('tanggal');
            $table->bigInteger('total')->nullable();
            $table->foreignId('spending_category_id')->constrained();
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
