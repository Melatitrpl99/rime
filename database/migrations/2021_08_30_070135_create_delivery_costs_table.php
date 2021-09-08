<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryCostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_costs', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->integer('harga');
            $table->char('regency_id', 4)->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delivery_costs');
    }
}
