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
            $table->foreignId('product_id')->constrained();
            $table->string('nama');
            $table->text('ket')->nullable();
            $table->unsignedBigInteger('harga_satuan')->nullable();
            $table->unsignedInteger('jumlah_item')->nullable();
            $table->unsignedBigInteger('sub_total')->nullable();
            $table->unsignedInteger('jumlah_stok')->nullable();
            $table->foreignId('spending_unit_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('color_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('size_id')
                ->nullable()
                ->constrained()
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
        Schema::drop('spending_details');
    }
}
