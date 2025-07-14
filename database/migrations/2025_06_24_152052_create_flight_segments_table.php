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
        Schema::create('flight_segments', function (Blueprint $table) {
            $table->id();
            $table->integer('sequence');  // Menentukan urutan segment dalam satu flight (contoh: 1 = keberangkatan, 2 = transit)
            $table->foreignId('flight_id')->constrained()->cascadeOnDelete(); // Relasi ke tabel flights → satu flight bisa punya beberapa segment
            $table->foreignId('airport_id')->constrained()->cascadeOnDelete(); // Relasi ke bandara → menunjukkan lokasi segment (bisa departure atau arrival)
            $table->dateTime('time'); // Waktu keberangkatan atau kedatangan pada segment ini
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_segments');
    }
};
