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
        Schema::create('transaction_passengers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrainded()->cascadeOnDelete();   // Relasi ke transaksi induk (satu transaksi bisa punya banyak penumpang)
            $table->foreignId('flight_seat_id')->constrained()->cascadeOnDelete(); // Relasi ke kursi penerbangan yang dipilih penumpang ini
            $table->string('name'); // Nama penumpang
            $table->date('date_of_birth'); // Tanggal lahir penumpang
            $table->string('nationality');  // Kewarganegaraan penumpang (misal: Indonesia, Malaysia, USA)
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_passengers');
    }
};
