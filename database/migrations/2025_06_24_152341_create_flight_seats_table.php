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
        Schema::create('flight_seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained()->cascadeOnDelete(); // Relasi ke tabel flights → satu penerbangan bisa punya banyak kursi
            $table->string('name');  // Nama kursi, contoh: A1, B3, C7, dst
            $table->string('row');  // Baris kursi, contoh: A, B, C, dst (bisa dipakai untuk grouping layout)
            $table->string('column'); // Kolom kursi, contoh: 1, 2, 3, dst
            $table->enum('class_type', ['economy', 'business']); // Menentukan kelas kursi → apakah ini kursi economy atau business
            $table->boolean('is_available')->default(false); // Status ketersediaan kursi: true = bisa dipilih, false = sudah terisi / di-lock
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_seats');
    }
};
