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
            $table->string('kode_pos');
            $table->char('village_id', 10)->index();
            $table->longtext('catatan')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_default')->default(false);
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
