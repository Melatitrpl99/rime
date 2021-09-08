<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimoniesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonies', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('product_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->text('isi')->nullable();
            $table->unsignedTinyInteger('rating');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['product_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('testimonies');
    }
}
