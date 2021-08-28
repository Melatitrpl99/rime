<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserShipmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shipments', function (Blueprint $table) {
            $table->id('id');
            $table->text('alamat');
            $table->string('kode_pos');
            $table->text('catatan')->nullable();
            $table->boolean('is_default')->default(false);
            $table->char('village_id', 10)->index();
            $table->foreignId('user_id')->constrained();
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
