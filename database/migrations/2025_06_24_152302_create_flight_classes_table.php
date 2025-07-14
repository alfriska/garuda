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
        Schema::create('flight_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained()->cascadeOnDelete(); // Relasi ke tabel flights → satu flight bisa punya beberapa kelas (economy, business)
            $table->enum('class_type', ['economy', 'business']);  // Jenis kelas yang tersedia untuk penerbangan ini
            $table->integer('price');  // Harga tiket untuk kelas ini
            $table->integer('total_seats'); // Jumlah total kursi yang tersedia untuk kelas ini
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_classes');
    }
};
