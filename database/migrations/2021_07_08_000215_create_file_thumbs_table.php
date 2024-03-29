<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileThumbsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_thumbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('path')->nullable();
            $table->string('dimensions');
            $table->string('size');
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
        Schema::drop('file_thumbs');
    }
}
