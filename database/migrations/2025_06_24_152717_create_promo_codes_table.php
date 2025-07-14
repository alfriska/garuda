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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');   // Kode promo yang digunakan user (misal: "DISKON50", "EARLYBIRD")
            $table->enum('discount_type', ['fixed', 'percentage'] );  // Jenis diskon:
            $table->integer('discount');   // Nilai diskon sesuai jenis di atas
            $table->dateTime('valid_until');   // Batas waktu penggunaan kode promo
            $table->boolean('is_used')->default(false);  // Apakah kode ini sudah digunakan (bisa untuk satu kali pakai)
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
