<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inputsurat', function (Blueprint $table) {
            $table->id();
            $table->string('NoSurat')->unique();
            $table->date('TanggalBuat');
            $table->string('Menimbang');
            $table->text('Dasar')->nullable();
            $table->text('Untuk');
            $table->date('DariTanggal');
            $table->date('SampaiTanggal');
            $table->enum('KabKota' , ['Banjarbaru', 'Samarinda', 'Palangkaraya', 'Pontianak', 'Tanjung Selor']);
            $table->enum('Provinsi' , ['Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Utara']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputsurat');
    }
};
