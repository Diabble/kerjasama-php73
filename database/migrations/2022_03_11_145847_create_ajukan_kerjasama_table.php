<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjukanKerjasamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajukan_kerjasama', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nohp');
            $table->string('instansi');
            $table->string('jabatan');
            $table->string('berkaspengaju');
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
        Schema::dropIfExists('ajukan_kerjasama');
    }
}
