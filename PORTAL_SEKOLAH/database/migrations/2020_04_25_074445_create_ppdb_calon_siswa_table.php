<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpdbCalonSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppdb_calon_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ppdb_id');
            $table->string('nama_lengkap',255);
            $table->string('tempat_lahir',255);
            $table->integer('tgl_lahir');
            $table->integer('bln_lahir');
            $table->integer('thn_lahir');
            $table->string('jenis_kelamin',10);
            $table->unsignedInteger('agama_id')->nullable();
            $table->text('alamat');
            $table->string('email',255)->nullable();
            $table->string('telepon',50);
            $table->string('nama_ayah',255)->nullable();
            $table->string('nama_ibu',255)->nullable();
            $table->string('pekerjaan_ayah',255)->nullable();
            $table->string('pekerjaan_ibu',255)->nullable();
            $table->decimal('penghasilan',8, 2)->nullable();
            $table->unsignedBigInteger('asal_sekolah_id')->nullable();
            $table->string('asal_sekolah',255)->nullable();
            $table->text('alamat_sekolah')->nullable();
            $table->string('npsn',255)->nullable();
            $table->string('no_telopon_sekolah',255)->nullable();
            $table->string('no_skhun',255)->nullable();
            $table->text('foto')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('ppdb_id')->references('id')->on('ppdb')->onDelete('cascade');
            $table->foreign('agama_id')->references('id')->on('agama')->onDelete('cascade');
            $table->foreign('asal_sekolah_id')->references('id')->on('ppdb_asal_sekolah')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('ppdb_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppdb_calon_siswa');
    }
}
