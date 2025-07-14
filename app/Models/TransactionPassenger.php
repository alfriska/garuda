<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TransactionPassenger extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaction_id',   
        'flight_seat_id',
        'name',
        'date_of_birth',
        'nationality',
    ];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class); //Relasi: Many to One, Penumpang ini bagian dari satu transaksi
    }

    public function seat()
    {
        return $this->belongsTo(FlightSeat::class); //Relasi: Many to One, Penumpang ini duduk di satu kursi penerbangan
    }
}
