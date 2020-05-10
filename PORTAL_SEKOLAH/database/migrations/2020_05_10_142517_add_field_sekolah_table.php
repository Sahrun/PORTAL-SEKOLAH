<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sekolah', function (Blueprint $table) {  
            $table->string('provinsi',255)->nullable();
            $table->string('kota',255)->nullable();
            $table->string('status',255)->nullable();
            $table->string('npsn',100)->nullable();
            $table->string('email',100)->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sekolah', function (Blueprint $table) {
            $table->dropColumn(['provinsi']);
            $table->dropColumn(['kota']);
            $table->dropColumn(['status']);
            $table->dropColumn(['npsn']);
            $table->dropColumn(['email']);
            $table->dropColumn(['created_by']);
            $table->dropColumn(['modified_by']);
        });
    }
}
