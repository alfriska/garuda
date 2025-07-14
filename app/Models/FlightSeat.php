<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FlightSeat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flight_id',
        'name',
        'row',
        'column',
        'class_type',
        'is_available',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class); //Relasi Eloquent: Many to One, Kursi ini milik satu penerbangan
    }

    public function passengers()
    {
        return $this->hasOne(TransactionPassenger::class); //Relasi: One to One, Kursi hanya bisa digunakan oleh satu penumpang
    }

}
