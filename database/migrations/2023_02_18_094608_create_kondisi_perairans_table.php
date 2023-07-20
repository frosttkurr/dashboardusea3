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
        Schema::create('kondisi_perairans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lokasi')->constrained('lokasis','id');
            $table->foreignId('id_staff')->constrained('users','id');
            $table->date('tanggal');
            $table->string('kondisi');
            $table->text('uraian');
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
        Schema::dropIfExists('kondisi_perairans');
    }
};
