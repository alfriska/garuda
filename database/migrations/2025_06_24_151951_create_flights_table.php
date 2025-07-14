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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number'); // Nomor penerbangan, contoh: GA123, JT456
            $table->foreignId('airline_id')->constrained()->cascadeOnDelete(); // Secara otomatis merujuk ke tabel 'airlines' dan kolom 'id',Jika maskapai dihapus, maka semua flight miliknya ikut terhapus
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
