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
        Schema::create('laporan_nelayans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lokasi')->constrained('lokasis','id');
            // $table->foreignId('id_nelayan')->constrained('users','id');
            $table->foreignId('id_jenis_temuan')->constrained('jenis_temuan_nelayans','id');
            $table->date('tanggal');
            $table->text('isi_laporan');
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
        Schema::dropIfExists('laporan_nelayans');
    }
};
