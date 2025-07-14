<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FlightSegment extends Model
{
   use HasFactory, SoftDeletes;

    protected $fillable = [
        'sequence',
        'flight_id',
        'airport_id',
        'time',
    ];  

    protected $casts = [
        'time' => 'datetime',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class); //Relasi: Many to One, Segmen ini milik satu penerbangan
    }
    public function airport()
    {
        return $this->belongsTo(Airport::class); //Relasi: Many to One, Segmen ini terjadi di satu bandara
    }
}
