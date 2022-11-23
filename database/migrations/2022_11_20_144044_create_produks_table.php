<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id');
            $table->string('name');
            $table->string('slug');
            $table->text('small_description');
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price')->nullable();
            $table->text('cover');
            $table->string('qty');
            $table->tinyInteger('popular')->default('0');
            $table->tinyInteger('is_active')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
