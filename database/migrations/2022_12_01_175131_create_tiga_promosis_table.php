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
        Schema::create('tiga_promosis', function (Blueprint $table) {
            $table->id();
            $table->text('title1')->nullable();
            $table->text('title2')->nullable();
            $table->string('link')->nullable();
            $table->string('image');
            $table->string('button_text');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('tiga_promosis');
    }
};
