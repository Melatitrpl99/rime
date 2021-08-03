<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id('id');
            $table->text('alamat');
            $table->string('no')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->char('village_id', 10)->index();
            $table->string('kode_pos');
            $table->longtext('catatan')->nullable();
            $table->foreignId('order_id')->constrained();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shipments');
    }
}
