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
        Schema::create('hasil_perhitungans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_marketing');
            $table->string('bulan');
            $table->integer('omset');
            $table->integer('komisi_percent');
            $table->integer('komisi_nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_perhitungans');
    }
};
