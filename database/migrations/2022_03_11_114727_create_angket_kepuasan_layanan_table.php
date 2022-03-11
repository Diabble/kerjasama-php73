<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngketKepuasanLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angket_kepuasan_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nohp');
            $table->string('email');
            $table->string('subject');
            $table->text('pesan');
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
        Schema::dropIfExists('angket_kepuasan_layanan');
    }
}
