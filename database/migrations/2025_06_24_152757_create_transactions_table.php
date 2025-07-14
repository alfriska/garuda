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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // Kode transaksi unik, misalnya: TX0001, INV20250701-XYZ
            $table->foreignId('flight_id')->constrained()->cascadeOnDelete(); // Relasi ke penerbangan yang dipilih user
            $table->foreignId('flight_class_id')->constrained()->cascadeOnDelete();   // Relasi ke kelas penerbangan (economy/business) yang dipilih
            // Data pemesan utama
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('number_of_passengers'); // Jumlah total penumpang dalam transaksi ini
            $table->foreignId('promo_code_id')->nullable()->constrained()->cascadeOnDelete();  // Relasi ke kode promo yang digunakan (jika ada)
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');  // Status pembayaran:
            $table->integer('subtotal')->nullable(); // Harga awal sebelum diskon
            $table->integer('grandtotal')->nullable(); // Harga akhir setelah diskon
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
