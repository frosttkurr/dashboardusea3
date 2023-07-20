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
        Schema::create('biotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis_biota')->nullable()->constrained('jenis_biotas','id');
            $table->string('nama_biota');
            $table->string('deskripsi')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('biotas');
    }
};
