<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama',255);
            $table->bigInteger('kelas_id');
            $table->boolean('is_active');
            $table->bigInteger('jurusan_id');
            $table->bigInteger('sekolah_id');
            $table->bigInteger('wali_kelas_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
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
        Schema::dropIfExists('sub_kelas');
    }
}
