<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrentstepIscompletePpdbCalonSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppdb_calon_siswa', function (Blueprint $table) {
            $table->integer('current_step')->nullable();
            $table->boolean('is_complete')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ppdb_calon_siswa', function (Blueprint $table) {
            $table->dropColumn(['current_step']);
            $table->dropColumn(['is_complete']);
        });
    }
}
