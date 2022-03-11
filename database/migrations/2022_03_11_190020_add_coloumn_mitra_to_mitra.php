<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColoumnMitraToMitra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mitra', function (Blueprint $table) {
            $table->string('ketunit')->after('jenisnaskah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mitra', function (Blueprint $table) {
            $table->dropColumn('ketunit');
        });
    }
}
