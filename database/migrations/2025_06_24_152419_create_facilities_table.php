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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Menyimpan path/URL gambar fasilitas (misal: 'images/facility/lounge.png')
            $table->string('name'); // Nama fasilitas, misal: "Free WiFi", "Lounge VIP", "In-flight Meal"
            $table->string('description');  // Penjelasan singkat fasilitas, misal: "WiFi gratis hingga 2 jam"
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
