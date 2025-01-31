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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number', 20)->unique();
            $table->foreignId('marketing_id')->constrained('marketings')->onDelete('cascade');
            $table->date('date');
            $table->unsignedBigInteger('cargo_fee')->default(0);
            $table->unsignedBigInteger('total_balance');
            $table->unsignedBigInteger('grand_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
