<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'iata_code',
        'name',
        'image',
        'city',
        'country',
    ];
    public function segments()
    {
        return $this->hasMany(FlightSegment::class); //Relasi Eloquent: One to Many, Satu bandara bisa menjadi bagian dari banyak segmen penerbangan (asal atau tujuan)
    }
}
