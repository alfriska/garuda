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
        Schema::create('flight_class_facility', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_class_id')->references('id')->on('flight_classes')->OnDelete('cascade'); // Relasi ke tabel 'flight_classes' → jika kelas dihapus, relasi ikut dihapus
            $table->foreignId('facility_id')->references('id')->on('facilities')->OnDelete('cascade');  // Relasi ke tabel 'facilities' → jika fasilitas dihapus, relasi ikut dihapus// Relasi ke tabel 'facilities' → jika fasilitas dihapus, relasi ikut dihapus
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_class_facility');
    }
};
